<?php
/**
 * Flexic
 * Copyright (c) 2019 ThemePoint
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0
 * @package flexic.component
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Flexic\DotEnv;

class Parser
{
    private $data;
    private $length;
    private $values = array();

    public function parse(string $data): array
    {
        $this->data = explode(PHP_EOL, $data);
        $this->length = \count($this->data);

        if ($this->length > 0) {
            foreach ($this->data as $line) {
                $referrers = strpos($line, '=');

                if ($line !== '' && $referrers !== false) {
                    $key = preg_replace('/([\s])/', '', substr($line, 0, $referrers));
                    $value = preg_replace('/([\s"\'])/', '', substr($line, ($referrers + 1), \strlen($line)));

                    $this->values[$key] = $value;
                }
            }
        }

        return $this->values;
    }
}
