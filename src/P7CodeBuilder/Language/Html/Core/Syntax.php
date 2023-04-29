<?php 

declare(strict_types=1);
/**
 * Defining current and valid HTML syntax parts - deprecated elements / attributtes are ignored for now
 * 
 * 
 * @FIXME - separate non empty & empty elements
 * @link https://github.com/SchrodtSven/P7CodeBuilder
 * @author Sven Schrodt<sven@schrodt.club>
 * @package P7CodeBuilder
 * @version 0.1
 */

namespace P7CodeBuilder\Language\Html\Core;

class Syntax
{
    private ListClass $availableElements;
    private ListClass $globalAtttributes;

    public function __construct()
    {
        $this->__init();
    }

    private function __init(): void
    {
        $this->availableElements = new ListClass(
            [
                'a',
                'abbr',
                'address',
                'area',
                'article',
                'aside',
                'audio',
                'b',
                'base',
                'bdi',
                'bdo',
                'blockquote',
                'body',
                'br',
                'button',
                'canvas',
                'caption',
                'cite',
                'code',
                'col',
                'colgroup',
                'data',
                'datalist',
                'dd',
                'del',
                'details',
                'dfn',
                'dialog',
                'div',
                'dl',
                'dt',
                'em',
                'embed',
                'fieldset',
                'figcaption',
                'figure',
                'footer',
                'form',
                'h1',
                'head',
                'header',
                'hgroup',
                'hr',
                'html',
                'i',
                'iframe',
                'image',
                'img',
                'input',
                'ins',
                'kbd',
                'label',
                'legend',
                'li',
                'link',
                'main',
                'map',
                'mark',
                'menu',
                'menuitem',
                'meta',
                'meter',
                'nav',
                'noscript',
                'object',
                'ol',
                'optgroup',
                'option',
                'output',
                'p',
                'picture',
                'portal',
                'Experimental',
                'pre',
                'progress',
                'q',
                'rp',
                'rt',
                'ruby',
                's',
                'samp',
                'script',
                'section',
                'select',
                'slot',
                'small',
                'source',
                'span',
                'strong',
                'style',
                'sub',
                'summary',
                'sup',
                'table',
                'tbody',
                'td',
                'template',
                'textarea',
                'tfoot',
                'th',
                'thead',
                'time',
                'title',
                'tr',
                'track',
                'u',
                'ul',
                'var',
                'video',
                'wbr'
            ]
        );

        $this->globalAtttributes = new ListClass(
            [
                'accesskey',
                'autocapitalize',
                'autofocus',
                'class',
                'contenteditable',
                'contextmenu',
                'Non-standard Deprecated',
                'data-*',
                'dir',
                'draggable',
                'enterkeyhint',
                'exportparts',
                'hidden',
                'id',
                'inert',
                'inputmode',
                'is',
                'itemid',
                'itemprop',
                'itemref',
                'itemscope',
                'itemtype',
                'lang',
                'nonce',
                'part',
                'popover',
                'Experimental',
                'slot',
                'spellcheck',
                'style',
                'tabindex',
                'title',
                'translate',
                'virtualkeyboardpolicy',
                'Experimental'
            ]
        );

    }
}