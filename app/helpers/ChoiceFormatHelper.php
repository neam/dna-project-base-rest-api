<?php

class ChoiceFormatHelper
{

    static public function toString($messagesArray)
    {
        $_ = array();
        foreach ($messagesArray as $expression => $t) {
            $_[] = $expression . "#" . $t;
        }
        return implode("|", $_);
    }

    static public function toArray($messagesString)
    {
        $n = preg_match_all('/\s*([^#]*)\s*#([^\|]*)\|/', $messagesString . '|', $matches);
        $return = array();
        for ($i = 0; $i < $n; ++$i) {
            $expression = $matches[1][$i];
            $message = $matches[2][$i];
            $return[$expression] = $message;
        }
        return $return;
    }

}