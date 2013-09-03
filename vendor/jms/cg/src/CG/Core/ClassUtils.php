<?php

/*
 * Copyright 2011 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace CG\Core;

use CG\Proxy\Enhancer;

abstract class ClassUtils
{
    public static function getUserClass($className)
    {
<<<<<<< HEAD
    	if (false === $pos = strrpos($className, '\\'.NamingStrategyInterface::SEPARATOR.'\\')) {
    		return $className;
    	}

=======
    	if (false === $pos = strrpos($className, '\\'.NamingStrategyInterface::SEPARATOR.'\\')) {
    		return $className;
    	}

>>>>>>> 80f68e249177bbb9188db2639a3d26547c148091
    	return substr($className, $pos + NamingStrategyInterface::SEPARATOR_LENGTH + 2);
    }

    private final function __construct() {}
}