<?php

abstract class DashboardTaskQueryBuilder extends CComponent
{
    /**
     * Builds a list of SQL queries to get the "started" translation task queries.
     *
     * @param Account $account the users account model.
     *
     * @return array the SQL queries.
     */
    abstract public function getStartedTaskQueries(Account $account);

    /**
     * Builds a list of SQL queries to get the "new" translation task queries.
     *
     * @param Account $account the users account model.
     *
     * @return array the SQL queries.
     */
    abstract public function getNewTaskQueries(Account $account);
}