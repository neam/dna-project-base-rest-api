<?php

class DashboardGroupTranslatorTaskQueryBuilder extends DashboardTaskQueryBuilder
{
    /**
     * @inheritdoc
     */
    public function getStartedTaskQueries(Account $account)
    {
        $queries = array();
        $lang1 = $account->profile->language1;
        $lang2 = $account->profile->language2;
        $lang3 = $account->profile->language3;
        if ($lang1 !== null) {
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            'TranslateIntoPrimaryLanguage' AS action,
                            translate_into_{$lang1}_validation_progress AS progress,
                            '{$lang1}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.id";
        }
        if ($lang2 !== null) {
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            'TranslateIntoSecondaryLanguage' AS action,
                            translate_into_{$lang2}_validation_progress AS progress,
                            '{$lang2}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.id";
        }
        if ($lang3 !== null) {
            $queries[] = "SELECT
                            i.id as id,
                            i.model_class,
                            i._title,
                            'TranslateIntoTertiaryLanguage' AS action,
                            translate_into_{$lang3}_validation_progress AS progress,
                            '{$lang3}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id = :account_id
                          GROUP BY i.id";
        }
        return $queries;
    }

    /**
     * @inheritdoc
     */
    public function getNewTaskQueries(Account $account)
    {
        $queries = array();
        $lang1 = $account->profile->language1;
        $lang2 = $account->profile->language2;
        $lang3 = $account->profile->language3;
        if ($lang1 !== null) {
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            'TranslateIntoPrimaryLanguage' AS action,
                            translate_into_{$lang1}_validation_progress AS progress,
                            '{$lang1}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item AS i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id != :account_id
                          GROUP BY i.id";
        }
        if ($lang2 !== null) {
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            'TranslateIntoSecondaryLanguage' AS action,
                            translate_into_{$lang2}_validation_progress AS progress,
                            '{$lang2}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item AS i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id != :account_id
                          GROUP BY i.id";
        }
        if ($lang3 !== null) {
            $queries[] = "SELECT
                            i.id AS id,
                            i.model_class,
                            i._title,
                            'TranslateIntoTertiaryLanguage' AS action,
                            translate_into_{$lang3}_validation_progress AS progress,
                            '{$lang3}' AS language,
                            'translation' AS task,
                            0 AS relevance
                          FROM item AS i
                          INNER JOIN changeset AS c ON c.node_id = i.node_id
                          INNER JOIN node_has_group AS nhg ON nhg.node_id = i.node_id
                          INNER JOIN group_has_account AS gha ON gha.group_id = nhg.group_id
                          WHERE gha.account_id = :account_id
                          AND c.user_id != :account_id
                          GROUP BY i.id";
        }
        return $queries;
    }
}