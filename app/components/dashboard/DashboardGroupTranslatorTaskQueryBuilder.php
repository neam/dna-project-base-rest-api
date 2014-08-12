<?php

class DashboardGroupTranslatorTaskQueryBuilder extends DashboardTaskQueryBuilder
{
    /**
     * @inheritdoc
     */
    public function getStartedTaskQueries(Account $account)
    {
        $queries = array();
        $languageData = $this->getAccountLanguageData($account);
        foreach ($languageData as $data) {
            $action = $data['action'];
            $language = $data['language'];
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            '{$action}' AS action,
                            translate_into_{$language}_validation_progress AS progress,
                            '{$language}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM _item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.node_id";
        }
        return $queries;
    }

    /**
     * @inheritdoc
     */
    public function getNewTaskQueries(Account $account)
    {
        $queries = array();
        $languageData = $this->getAccountLanguageData($account);
        foreach ($languageData as $data) {
            $action = $data['action'];
            $language = $data['language'];
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            '{$action}' AS action,
                            translate_into_{$language}_validation_progress AS progress,
                            '{$language}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM _item AS i
                          LEFT OUTER JOIN changeset AS c ON c.node_id = i.node_id AND c.user_id = :account_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id IS NULL
                          GROUP BY i.node_id";
        }
        return $queries;
    }

    /**
     * Returns account language data.
     *
     * @param Account $account the account model.
     *
     * @return array the data.
     */
    protected function getAccountLanguageData(Account $account)
    {
        $data = array();
        if ($account->profile->language1 !== null) {
            $data[] = array(
                'language' => $account->profile->language1,
                'action' => 'TranslateIntoPrimaryLanguage',
            );
        }
        if ($account->profile->language2 !== null) {
            $data[] = array(
                'language' => $account->profile->language2,
                'action' => 'TranslateIntoSecondaryLanguage',
            );
        }
        if ($account->profile->language3 !== null) {
            $data[] = array(
                'language' => $account->profile->language3,
                'action' => 'TranslateIntoTertiaryLanguage',
            );
        }
        return $data;
    }
}