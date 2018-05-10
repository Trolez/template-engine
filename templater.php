<?php
/* A simple HTML template engine
 * Author: Troels Bay-Petersen
 */

class SimpleTemplater
{
    //Returns a processed template
    public function renderTemplate($template, $values = []) {
        if (!file_exists($template)) {
            throw new Exception("The template file could not be found.");
        }

        //Read contents of template file
        $fileContent = file_get_contents($template);

        //Process placeholders in template
        $fileContent = $this->processPlaceholders($fileContent, (array)$values);

        return $fileContent;
    }

    //Replaces placeholders with supplied values
    private function processPlaceholders($string, $values) {
        foreach ($values as $placeholder => $replacement) {
            //Regular expression matching {{ VALUE }} with arbitrary whitespace within the brackets
            $pattern = "/\{\{[\s*]" . $placeholder . "[\s*]\}\}/";

            //Replace all occurrences of the current placeholder
            $string = preg_replace($pattern, htmlentities($replacement), $string);
        }

        return $string;
    }
}
?>