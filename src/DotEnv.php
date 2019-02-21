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

use Flexic\DotEnv\Exceptions\PathException;

class DotEnv
{
    public function parseFile(string $path): array
    {
        if (!is_file($path) || is_dir($path) || !is_readable($path)) {
            throw new PathException(sprintf('Path %s do not exists or is not accessible', $path));
        }

        return (new Parser())->parse((string) file_get_contents($path));
    }

    public function parse(string $input): array
    {
        return (new Parser())->parse($input);
    }

    public function populate(array $data, bool $overrideExistingVars = false): void
    {
        foreach ($data as $key => $value) {
            if (isset($_ENV[$key]) && !$overrideExistingVars) {
                continue;
            }

            putenv(sprintf('%s=%s', $key, $value));
            $_ENV[$key] = $value;
        }
    }
}
