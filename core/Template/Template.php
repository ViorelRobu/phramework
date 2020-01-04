<?php

namespace Phramework\Core\Template;

class Template
{
    protected $tags;
    protected $template;

    public function __construct(array $tags, $path)
    {
        $this->setUp($tags);
        $this->loadFile($path);
        $this->translateFile();
        $this->render();
    }
    
    /**
     * Set the templates that can be used
     * 
     * @param $name - template name
     * @param $value - template value
     * @return void
     */
    public function setUp(array $tags)
    {
        return $this->tags = $tags;
    }

    /**
     * Reads the file contents into an array and loads it into memory
     * 
     * @param $file - file path
     * @return 
     */
    protected function loadFile($file)
    {
        return $this->template = file($file, 2);
    }

    /**
     * Reads the file stored in memory and replaces the tags inside with the correct php code
     */
    protected function translateFile()
    {
        foreach ($this->template as $key => $value) {
            $this->template[$key] = str_replace(array_keys($this->tags), array_values($this->tags), $value);
        }
    }

    /**
     * Returns the translated output in HTML format
     */
    public function render()
    {
        print implode(PHP_EOL, $this->template);
    }
}