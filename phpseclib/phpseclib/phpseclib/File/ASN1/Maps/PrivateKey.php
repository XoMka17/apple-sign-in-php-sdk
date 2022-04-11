<?php

/**
 * PrivateKey
 *
 * PHP version 5
 *
 * @category  File
 * @package   ASN1
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2016 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */

namespace phpseclibnzr3\File\ASN1\Maps;

use phpseclibnzr3\File\ASN1;

/**
 * PrivateKey
 *
 * @package ASN1
 * @author  Jim Wigginton <terrafrost@php.net>
 * @access  public
 */
abstract class PrivateKey
{
    const MAP = ['type' => ASN1::TYPE_OCTET_STRING];
}
