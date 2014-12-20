# KAKU - 'Klik aan Klik uit'

This library provides a basic object interface for calling a the KAKU program to switch devices with the Raspberry Pi and a 433mhz transmitter.

A complete description of how to setup the KAKU program on the Raspberry Pi is found [here](http://weejewel.tweakblogs.net/blog/8665/lampen-schakelen-met-een-raspberry-pi.html) in Dutch.

## Installation
The best way to add the library to your project is using [composer](http://getcomposer.org).

	$ composer require rudidevries/kaku


## Usage

For more information on setting up de SSH connection and authentication take a look at [herzult/php-ssh](https://github.com/Herzult/php-ssh).

The main principle is to setup an SSH connection, create a switch object, and give this object the channel to switch.

The command object should be passed the path to the kaku executable, as compiled from [this](https://www.dropbox.com/s/nxdrkuk94w9fpqo/lights.zip?dl=1) c++ code.

Example:

	// SSH Connection setup
	$config = new Ssh\Configuration($host);
	$auth = new Ssh\Authentication\PublicKeyFile(
		$username,
		$pathToPublicKey,
		$pathToPrivateKey,
		$passPhrase
	);
	$session = new Ssh\Session($config, $auth);
	
	// Create switcher
	$command = new Kaku\Command\SshCommand(
		$session,
		'/path/to/kaku'
	);
	$switcher = new Kaku\Switcher($command);
	
	// Create channel description
	$channel = new Kaku\Channel(
		'description of switch point',
		'A',
		10
	);
	
	// Send signals
	$switcher->sendOn($channel);
	$switcher->sendOff($channel);

# Symfony bundle

For easy integration in a Symfony based project, the [kaku-bundle](https://github.com/rudidevries/kaku-bundle) is also available.