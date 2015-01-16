<?php

interface TranslatableResource
{
    public function translate($params);
    public function getTranslatableAttributes();
}
