<?php
/**
 * Expose the schema definitions for syndication MRSS, bulk upload XML and other schema types. 
 * 
 * @service schema
 * @package api
 * @subpackage services
 */
class SchemaService extends KalturaBaseService 
{
	/**
	 * Serves the requested XSD according to the type and name. 
	 * 
	 * @action serve
	 * @param KalturaSchemaType $type  
	 * @param string $name
	 * @return file 
	 */
	function serveAction($type, $name = null)
	{
		$ns = 'http://' . kConf::get('www_host') . "/$type";
		if($name)
			$ns .= "/$name";
			
		$xsd = new SimpleXMLElement('<schema/>', null, null, 'http://www.w3.org/2001/XMLSchema');
		$xsd->addAttribute('targetNamespace', $ns);
		$xsd->addAttribute('xmlns:xs', 'http://www.w3.org/2001/XMLSchema');
		
		if(!$name)
		{
			$redefine = $xsd->addChild('redefine');
			$redefine->addAttribute('schemaLocation', 'http://' . kConf::get('cdn_host') . "/api_v3/service/schema/action/serve/type/$type/name/core");
		}
		
		$schemaContributors = KalturaPluginManager::getPluginInstances('IKalturaSchemaContributor');
		foreach($schemaContributors as $key => $schemaContributor)
			$schemaContributor->contributeToSchema($type, $xsd);
				
		echo $xsd->saveXML();
		exit;
	}
}
