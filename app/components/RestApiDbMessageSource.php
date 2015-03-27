<?php

/**
 *
 */
class RestApiDbMessageSource extends CDbMessageSource
{
    /**
     * @var bool whether language fall-backs should be used, i.e. pt_br => pt.
     */
    public $useLangFallback = true;

    /**
     * @var array runtime cache for translation strings.
     */
    protected $loadedMessages = array();

    /**
     * Translates the specified message.
     *
     * If the message is not found, an {@link onMissingTranslation} event will be raised.
     *
     * @param string $category the category that the message belongs to
     * @param string $message the message to be translated
     * @param string $language the target language
     * @return string the translated message
     */
    protected function translateMessage($category, $message, $language)
    {
        $key = $language . '.' . $category;

        if (!isset($this->loadedMessages[$key])) {
            $this->loadedMessages[$key] = $this->loadMessages($category, $language);
        }
        if (isset($this->loadedMessages[$key][$message]) && $this->loadedMessages[$key][$message] !== '') {
            return $this->loadedMessages[$key][$message];
        }

        // If requested language is `pt_br` and a translation could not be found, then try `pt`.
        if ($this->useLangFallback && strlen($language) === 5) {
            $fallbackLanguage = substr($language, 0, 2);
            $key = $fallbackLanguage . '.' . $category;

            if (!isset($this->loadedMessages[$key])) {
                $this->loadedMessages[$key] = $this->loadMessages($category, $fallbackLanguage);
            }
            if (isset($this->loadedMessages[$key][$message]) && $this->loadedMessages[$key][$message] !== '') {
                return $this->loadedMessages[$key][$message];
            }
        }

        if ($this->hasEventHandler('onMissingTranslation')) {
            $event = new CMissingTranslationEvent($this, $category, $message, $language);
            $this->onMissingTranslation($event);
            return $event->message;
        }

        return $message;
    }
}
