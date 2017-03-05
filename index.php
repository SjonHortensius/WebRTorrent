<?php

spl_autoload_register(function($class){
	$class = str_replace('\\', '/', $class);

	if (0 === strpos($class, 'TooBasic/Rpc/'))
		require('TooBasic-Rpc/' . substr($class, strlen('TooBasic/Rpc/')) .'.php');
	elseif (0 === strpos($class, 'TooBasic/'))
		require('TooBasic/' . substr($class, strlen('TooBasic/')) .'.php');
});

class webRTorrent extends TooBasic\Controller
{
	public static $client;
	public static $tpl;
	protected $_config;

	protected function _construct()
	{
		header('Content-Type: text/html; charset=utf-8');

		require('config.php');
		$this->_config = $config;

		$scgi = new TooBasic\Rpc\Transport\Scgi(new TooBasic\Rpc\Transport\Socket);
		self::$client = new TooBasic\Rpc\Client\Xml('raw://'.$this->_config['rtorrentRpc'].'/RPC2', $scgi);

		self::$tpl = new TooBasic\Template;

		$this->_config['siteRoot'] = rtrim('/', $this->_config['siteRoot']).'/';
	}

	public function postAdd()
	{
		$url = parse_url($_POST['magnet']);
		if (!$url || 'magnet' != $url['scheme'])
			throw new Exception('Could not parse magnet link');

		parse_str($url['query'], $parts);

		$hash = substr($parts['xt'], strlen('urn:btih:'));

		if (32 == strlen($hash))
			$hash = self::decodeBase32($hash);

		if (40 != strlen($hash))
			throw new Exception('Invalid hash in magnet link');

		self::$client->load_start($_POST['magnet']);

		header('Location: '. $this->_config['siteRoot']);
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
				'bytes_done' => self::$client->d->bytes_done($hash),
				'state' => '',
			];

		print self::$tpl->get('index')->getWrapped();
	}

	public static function decodeBase32($str)
	{
        $buffer = 0;
        $left = 0;
        $output = '';

		foreach (str_split(strtoupper($str)) as $c)
        {
			$val = strpos('ABCDEFGHIJKLMNOPQRSTUVWXYZ234567=', $c);

			if (false === $val)
				throw new Exception('Unexpected character in input: '. $c);

			$buffer <<= 5;
			$buffer |= $val;
			$left += 5;

			if ($left >= 8)
			{
				$output .= chr(($buffer >> ($left - 8)) & 0xFF);
				$left -= 8;
			}
		}

		if ($left > 0)
		{
			$buffer <<= 5;
			$output .= chr(($buffer >> ($left - 3)) & 0xFF);
        }

		return strtoupper(bin2hex($output));
	}

	public static function binaryPrefix($size, $precision = 0, $format = '%.2f %sb')
	{
		$prefixes = array('K', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y');
		$prefix = NULL;

		while ($size >= 1024 && $prefix = array_shift($prefixes))
			$size = round($size/1024, $precision);

		return sprintf($format, $size, $prefix);
	}
}

webRTorrent::dispatch('/'. $_SERVER['QUERY_STRING']);