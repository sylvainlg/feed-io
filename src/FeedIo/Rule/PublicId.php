<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/11/14
 * Time: 11:24
 */
namespace FeedIo\Rule;

use FeedIo\Feed\NodeInterface;
use FeedIo\RuleAbstract;

class PublicId extends RuleAbstract
{
    const NODE_NAME = 'guid';

    /**
     * @param  NodeInterface $node
     * @param  \DOMElement   $element
     * @return mixed
     */
    public function setProperty(NodeInterface $node, \DOMElement $element)
    {
        $node->setPublicId($element->nodeValue);

        return $node;
    }

    /**
     * @inheritDoc
     */
    protected function hasValue(NodeInterface $node) : bool
    {
        return !! $node->getPublicId();
    }

    /**
     * @inheritDoc
     */
    protected function addElement(\DomDocument $document, \DOMElement $rootElement, NodeInterface $node) : void
    {
        $rootElement->appendChild($document->createElement($this->getNodeName(), $node->getPublicId()));
    }
}
