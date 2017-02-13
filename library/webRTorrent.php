<?php

class webRTorrent extends TooBasic\Controller
{
	public static $client;
	public static $tpl;

	protected function _construct()
	{
		$scgi = new TooBasic\Rpc\Transport\Scgi(new TooBasic\Rpc\Transport\Socket);
		self::$client = new TooBasic\Rpc\Client\Xml('raw://localhost:5000/RPC2', $scgi);

		self::$tpl = new TooBasic\Template;
	}

	public function postAdd()
	{
		self::$client->add();

		print self::$tpl->get('add')->getWrapped();
	}

	public function getTest()
	{
		print self::$tpl->get('test')->getWrapped();
	}

	protected function _handle(TooBasic\Exception $e)
	{
		if (!headers_sent())
		{
			header('Content-Type: text/plain');
			http_response_code(500);
		}

		echo str_replace(dirname(__DIR__), '.', $e);
	}

	public function getIndex()
	{
		self::$tpl->list = [];
		foreach (self::$client->download_list() as $hash)
			self::$tpl->list[$hash] = (object)[
				'name' => self::$client->d->name($hash),
				'size_bytes' => self::$client->d->size_bytes($hash),
				'bytes_done' => self::$client->d->bytes_done($hash)
			];

		print self::$tpl->get('index')->getWrapped();
die;
		print_r(self::$client->system->listMethods());
	}
}
