<?php
/**
 * @package Core
 * @subpackage model.data
 */
class kAccessControlServeRemoteEdgeServerAction extends kRuleAction 
{
	/**
	 * @var string
	 */
	protected $edgeServerIds;

	/**
	 * @var bool
	 */
	protected $seamlessFallback;

	public function __construct()
	{
		parent::__construct(RuleActionType::SERVE_FROM_REMOTE_SERVER);
	}
	
	/**
	 * @return array
	 */
	public function getEdgeServerIds() 
	{
		return $this->edgeServerIds;
	}
	/**
	 * @param array $edgeServerIds
	 */
	public function setEdgeServerIds($edgeServerIds) 
	{
		$this->edgeServerIds = $edgeServerIds;
	}
	
	public function getRegiteredNodeServers()
	{
		$edgeServerIds = explode(',', $this->getEdgeServerIds());
		$edgeServers = ServerNodePeer::retrieveRegisteredServerNodesArrayByPKs($edgeServerIds);
		
		return $edgeServers;
	}
	
	public function applyDeliveryProfileDynamicAttributes(DeliveryProfileDynamicAttributes $deliveryAttributes)
	{	
		$edgeServers = $this->getRegiteredNodeServers();
		
		if(!count($edgeServers))
			return false;
		
		$activeEdgeServerIds = array();
		foreach ($edgeServers as $edgeServer)
		{
			/* @var $edgeServer EdgeServerNode */
			if($edgeServer->validateEdgeTreeRegistered())
				$activeEdgeServerIds[] = $edgeServer->getId();
		}
		
		if(!count($activeEdgeServerIds))
			return false;
		
		$deliveryAttributes->setEdgeServerIds($activeEdgeServerIds);
		$deliveryAttributes->setEdgeServerFallback($this->getSeamlessFallback());
		return true;
	}

	/**
	 * @return bool
	 */
	public function getSeamlessFallback()
	{
		return $this->seamlessFallback;
	}

	/**
	 * @param bool $seamlessFallback
	 */
	public function setSeamlessFallback(bool $seamlessFallback)
	{
		$this->seamlessFallback = $seamlessFallback;
	}


}
e