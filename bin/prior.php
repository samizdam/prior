<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$climate = new League\CLImate\CLImate();

$input = $climate->input('Enter your options, one per line (Press Ctrl+D for submit)');
$input->multiLine();

$response = $input->prompt();

$values = explode(PHP_EOL, $response);

$options = [];
foreach ($values as $value) {
	$options[] = new \Samizdam\Prior\Option($value);
}

$generator = new \Samizdam\Prior\PairGenerator();
$pairSet = $generator->generatePairs($options);

$climate->out('Thank you. ');

foreach ($pairSet as $pair) {
	$option1 = $pair->current();
	$value1 = $option1->getValue();
	$pair->next();
	$option2 = $pair->current();
	$value2 = $option2->getValue();
	$stepValues = [
		$value1,
		$value2,
	];
	$radio = $climate->radio('Choose', $stepValues);
	$response = $radio->prompt();

	$response === $value1 ? $option1->addVote() : $option2->addVote();
}

$climate->out('Result list:');

$optionsSet = new \Samizdam\Prior\OptionSet();
foreach ($options as $option) {
	$optionsSet->addOption($option);
}

$i = 1;
foreach ($optionsSet->getOptions() as $option) {
	$item = sprintf('%d. %s (%s vote)', $i++, $option->getValue(), $option->getVote());
	$climate->out($item);
}
