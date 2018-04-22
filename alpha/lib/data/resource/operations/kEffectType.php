<?php
/**
 * @package plugins.cuePoint
 * @subpackage api.en
 */
interface kEffectType extends BaseEnum
{
	const AUDIO_FADE_IN = 1;
	const AUDIO_FADE_OUT = 2;
	const VIDEO_FADE_IN = 3;
	const VIDEO_FADE_OUT = 4;
}
