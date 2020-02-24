<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/text.proto

namespace Google\Cloud\AutoMl\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Dataset metadata for text sentiment.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1beta1.TextSentimentDatasetMetadata</code>
 */
class TextSentimentDatasetMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. A sentiment is expressed as an integer ordinal, where higher
     * value means a more positive sentiment. The range of sentiments that will be
     * used is between 0 and sentiment_max (inclusive on both ends), and all the
     * values in the range must be represented in the dataset before a model can
     * be created. sentiment_max value must be between 1 and 10 (inclusive).
     *
     * Generated from protobuf field <code>int32 sentiment_max = 1;</code>
     */
    private $sentiment_max = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $sentiment_max
     *           Required. A sentiment is expressed as an integer ordinal, where higher
     *           value means a more positive sentiment. The range of sentiments that will be
     *           used is between 0 and sentiment_max (inclusive on both ends), and all the
     *           values in the range must be represented in the dataset before a model can
     *           be created. sentiment_max value must be between 1 and 10 (inclusive).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Text::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. A sentiment is expressed as an integer ordinal, where higher
     * value means a more positive sentiment. The range of sentiments that will be
     * used is between 0 and sentiment_max (inclusive on both ends), and all the
     * values in the range must be represented in the dataset before a model can
     * be created. sentiment_max value must be between 1 and 10 (inclusive).
     *
     * Generated from protobuf field <code>int32 sentiment_max = 1;</code>
     * @return int
     */
    public function getSentimentMax()
    {
        return $this->sentiment_max;
    }

    /**
     * Required. A sentiment is expressed as an integer ordinal, where higher
     * value means a more positive sentiment. The range of sentiments that will be
     * used is between 0 and sentiment_max (inclusive on both ends), and all the
     * values in the range must be represented in the dataset before a model can
     * be created. sentiment_max value must be between 1 and 10 (inclusive).
     *
     * Generated from protobuf field <code>int32 sentiment_max = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setSentimentMax($var)
    {
        GPBUtil::checkInt32($var);
        $this->sentiment_max = $var;

        return $this;
    }

}

