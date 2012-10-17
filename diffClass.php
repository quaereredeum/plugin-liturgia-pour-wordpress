<?php

/**
 * Simple diff class.
 *
 * Copyright (c) 2005-2010 Artur Graniszewski (aargoth@boo.pl) 
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 * - Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * - Neither the name of the Lotos Framework nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Library
 * @package    Lotos
 * @subpackage Utilities
 * @copyright  Copyright (c) 2005-2010 Artur Graniszewski (aargoth@boo.pl)
 * @license    New BSD License
 * @version    $Id$
 */

class Diff
{
    /**
     * Creates LCS matrix (naive non optimized version).
     * 
     * @param mixed[] $left
     * @param mixed[] $right
     * @return mixed[] LCS matrix
     */
    protected static function makeLcs($left, $right) {
        $matrix = array(array());
        for($i = 0; $i <= count($left); $i++) {
            $matrix[$i][0] = 0;
        }

        for($i = 0; $i <= count($right); $i++) {
            $matrix[0][$i] = 0;
        }
        $leftCount = count($left);
        $rightCount = count($right);
        for($leftIndex = 1; $leftIndex < $leftCount; $leftIndex++) {
            $leftValue = $left[$leftIndex];
            for($rightIndex = 1; $rightIndex < $rightCount; $rightIndex++) {
                $rightValue = $right[$rightIndex];
                if($leftValue == $rightValue) {
                    $matrix[$leftIndex][$rightIndex] = $matrix[$leftIndex - 1][$rightIndex - 1] + 1;
                } else {
                    $matrix[$leftIndex][$rightIndex] = 
                        (
                            $matrix[$leftIndex][$rightIndex - 1] > $matrix[$leftIndex - 1][$rightIndex] 
                            ? 
                            $matrix[$leftIndex][$rightIndex - 1] 
                            : 
                            $matrix[$leftIndex - 1][$rightIndex]
                        );
                }
            }
        }
        
        return $matrix;
    }
    
    /**
     * Traverses through LCS matrix.
     * 
     * @param mixed[] $matrix LCS matrix
     * @param mixed[] $left
     * @param mixed[] $right
     * @param int $i Current left coordinate.
     * @param int $j Current right coordinate.
     * @param int $start Starting index (not used in naive version of diff).
     * @param string $result
     */
    protected static function traverseLcs($matrix, $left, $right, $i, $j, $start = 0, & $result = '') {
        if($i > $start && $j > $start && $left[$i] === $right[$j]) {
            self::traverseLcs($matrix, $left, $right, $i - 1, $j - 1, $start, $result);
            $result .= " ".$left[$i]."\n";
        } else {
            if($j > $start && ($i == $start || $matrix[$i][$j - 1] >= $matrix[$i - 1][$j])) {
                self::traverseLcs($matrix, $left, $right, $i, $j - 1, $start, $result);
                $result .=  "<font color=green>".$right[$j]." </font>";
            } else if($i > $start && ($j == $start || $matrix[$i][$j - 1] < $matrix[$i - 1][$j])) {
                self::traverseLcs($matrix, $left, $right, $i - 1, $j, $start, $result);
                $result .= "<font color=red><s>".$left[$i]."</s></font> ";
                
            } else {
            }
        }
    }
    
    /**
     * Creates diff for two strings.
     * 
     * @param string $left String #1.
     * @param string $right String #2.
     * @return string
     */    
    public static function compare($left, $right) {
        $left = explode(" ", $left);
        $right = explode(" ", $right);
         return self::compareArray($left, $right);
    }        

    /**
     * Creates diff for two custom arrays.
     * 
     * @param mixed[] $left Array #1.
     * @param mixed[] $right Array #2.
     * @return string
     */
    public static function compareArray($left, $right) {
        array_unshift($left, '');
        array_unshift($right, '');
         $matrix = self::makeLcs($left, $right);
         $result = "";
         self::traverseLcs($matrix, $left, $right, count($left) - 1, count($right) - 1, 0, $result);
         return $result;
    }        
}


?>
