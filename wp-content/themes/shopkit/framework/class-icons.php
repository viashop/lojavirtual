<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}


	class ShopKit_Icons {
		public static $icons;

		public static function init() {
			$class = __CLASS__;
			new $class;
		}

		function __construct() {

			self::$icons = array(
				'line-icon' => array(
					'close' => 'M48 209c1,1 2,1 3,1 1,0 3,-1 4,-2l73 -73 73 73c1,2 3,2 4,2 1,0 2,-1 3,-1 3,-2 3,-6 1,-8l-74 -73 73 -73c2,-2 2,-5 0,-7 -2,-3 -5,-3 -7,0l-73 73 -73 -73c-2,-2 -5,-2 -7,0 -3,2 -3,5 -1,7l74 73 -74 73c-2,2 -2,6 1,8z',
					'login' => 'M128 26c9,0 18,2 27,6 8,3 16,9 22,15l0 0c7,6 12,14 16,23 3,8 5,17 5,26 0,7 -1,13 -3,19 -1,6 -4,12 -7,17 0,1 0,1 0,2 0,0 0,1 0,1 6,4 12,9 17,15 5,5 9,11 13,17 5,8 9,17 11,26 2,9 4,18 4,28l0 1c0,2 -1,4 -2,5 -2,2 -3,3 -5,3l-196 0c-2,0 -3,-1 -5,-3 -1,-1 -2,-3 -2,-5l0 -1c0,-10 2,-19 4,-28 2,-9 6,-18 11,-26 4,-6 8,-12 13,-17 5,-6 11,-11 17,-15 0,0 0,-1 0,-1 0,-1 0,-1 0,-2 -3,-5 -6,-11 -7,-17 -2,-6 -3,-12 -3,-19 0,-9 2,-18 5,-26 4,-9 9,-17 16,-23l0 0c6,-6 14,-12 22,-15 9,-4 18,-6 27,-6zm46 123c-6,5 -13,10 -21,13 -8,3 -16,4 -25,4 -9,0 -17,-1 -25,-4 -8,-3 -15,-8 -21,-13 -1,-1 -1,-1 -2,-1 0,0 0,0 -1,1 -5,3 -10,7 -14,12 -5,5 -9,10 -12,15 -3,5 -5,11 -7,16 -2,6 -4,12 -4,17 0,1 0,1 0,1 0,1 0,1 0,1 0,0 1,1 1,1 0,0 0,0 1,0l168 0c1,0 1,0 1,0 0,0 1,-1 1,-1 0,0 0,0 0,-1 0,0 0,0 0,-1 0,-5 -2,-11 -4,-17 -2,-5 -4,-11 -7,-16 -3,-5 -7,-10 -12,-15 -4,-5 -9,-9 -14,-12 -1,-1 -1,-1 -1,-1 -1,0 -1,0 -2,1zm-9 -90c-5,-4 -11,-8 -17,-11 -6,-2 -13,-4 -20,-4 -7,0 -14,2 -20,4 -6,3 -12,7 -17,11 -5,5 -9,11 -11,17 -3,7 -4,13 -4,20 0,7 1,14 4,20 2,7 6,12 11,17 5,5 11,9 17,12 6,2 13,4 20,4 7,0 14,-2 20,-4 6,-3 12,-7 17,-12 5,-5 9,-10 11,-17 3,-6 4,-13 4,-20 0,-7 -1,-13 -4,-20 -2,-6 -6,-12 -11,-17z',
					'menu' => 'M32 220l192 0c2,0 4,-2 4,-5l0 -10c0,-3 -2,-5 -4,-5l-192 0c-2,0 -4,2 -4,5l0 10c0,3 2,5 4,5zm0 -164l192 0c2,0 4,-2 4,-5l0 -10c0,-3 -2,-5 -4,-5l-192 0c-2,0 -4,2 -4,5l0 10c0,3 2,5 4,5zm0 82l192 0c1,0 2,-1 3,-2 1,0 1,-1 1,-3l0 -10c0,-3 -2,-5 -4,-5l-192 0c-2,0 -4,2 -4,5l0 10c0,2 0,3 1,3 1,1 2,2 3,2z',
					'search' => 'M129 163c-6,3 -13,4 -20,4 -8,0 -15,-2 -22,-4 -7,-3 -14,-8 -19,-13 -11,-11 -17,-26 -17,-41 0,-15 6,-30 17,-41 5,-5 12,-10 19,-13 7,-2 14,-4 22,-4 8,0 15,2 22,4 7,3 13,8 19,13 10,11 16,24 17,38 0,14 -4,28 -13,40l49 50c1,1 2,2 2,4 0,1 -1,2 -2,3l0 0c0,1 -1,1 -1,2 -1,0 -2,0 -2,0 -1,0 -2,0 -3,0 0,-1 -1,-1 -1,-2l-50 -50c-5,5 -11,8 -17,10l0 0zm-38 -98c-6,3 -11,6 -15,11 -10,9 -14,21 -14,33 0,12 4,24 14,33 4,5 9,8 15,11 5,2 12,3 18,3 6,0 12,-1 18,-3 5,-3 11,-6 15,-11 9,-9 14,-21 14,-33 0,-12 -5,-24 -14,-33 -4,-5 -10,-8 -15,-11 -6,-2 -12,-3 -18,-3 -6,0 -13,1 -18,3l0 0z',
					'cart' => 'M219 69l-32 6c-2,1 -4,3 -4,5l0 21 -121 0c-2,0 -3,2 -4,3 -1,2 -1,4 0,6l29 42c1,1 2,2 4,2l86 0 0 12 -73 0c0,0 0,0 0,0 0,0 0,0 -1,0 -9,0 -16,7 -16,17 0,9 7,17 16,17 10,0 17,-8 17,-17 0,-2 0,-5 -1,-7l43 0c-1,2 -1,5 -1,7 0,9 7,17 16,17 10,0 17,-8 17,-17 0,-6 -3,-11 -7,-14l0 -15 1 0c3,0 5,-2 5,-5l0 -42c0,0 0,-1 0,-1 0,0 0,0 0,0l0 -21 28 -6c2,0 4,-3 4,-6 -1,-3 -4,-5 -6,-4l0 0zm-116 121c-3,0 -6,-3 -6,-7 0,-4 3,-7 6,-7 4,0 7,3 7,7 0,4 -3,7 -7,7zm74 0c-3,0 -6,-3 -6,-7 0,-4 3,-7 6,-7 4,0 7,3 7,7 0,4 -3,7 -7,7zm-105 -78l111 0 0 32 -89 0 -22 -32z',
					'facebook' => 'M169 54l-21 0 0 0c-2,0 -25,-1 -31,23l0 1c0,2 -2,9 -2,24 0,3 -2,5 -5,5l0 0 0 0 -23 0 0 12 25 0c3,0 6,2 6,5l0 0 0 78 19 0 0 -78c0,-3 2,-5 5,-5l0 0 25 0 0 -12 -25 0c-3,0 -5,-2 -5,-5l0 0 0 -13c0,-6 2,-12 7,-17 4,-3 10,-6 17,-6l8 0 0 -12 0 0zm-21 -11l26 0 0 0c3,0 5,3 5,6l0 23 0 0c0,3 -2,5 -5,5l-13 0c-4,0 -8,1 -10,3 -2,2 -3,5 -3,9l0 8 24 0 0 0c3,0 6,2 6,5l0 22 0 0c0,3 -3,6 -6,6l-24 0 0 77 0 0c0,3 -3,6 -6,6l-30 0 0 0c-3,0 -5,-3 -5,-6l0 -78 -25 0 0 0c-3,0 -5,-2 -5,-5l0 -22 0 0c0,-3 2,-5 5,-5l23 0c0,-15 2,-22 2,-23l0 0c8,-31 38,-31 41,-31l0 0 0 0zm0 11l0 0 0 0zm0 0l0 0 0 0z',
					'twitter' => 'M201 84c-3,0 -5,0 -5,0l0 0c-2,1 -3,0 -4,-1 -2,-3 -2,-6 0,-7 2,-2 4,-3 5,-4 -4,1 -8,1 -11,1l0 0c-1,0 -2,-1 -3,-1 -3,-3 -7,-6 -10,-7 -4,-2 -8,-2 -12,-2 -8,0 -16,3 -21,8l0 0c-6,6 -9,14 -9,22 0,1 0,2 0,3l0 0c0,2 1,3 1,4 0,0 0,1 0,1 0,3 -2,5 -5,5 -33,2 -61,-22 -72,-33 -6,19 10,34 11,35 1,1 2,2 2,3 0,3 -2,5 -4,6 -4,0 -7,-1 -10,-2 4,18 21,23 23,23 1,0 2,1 3,3 1,2 0,5 -2,6 -3,1 -6,2 -9,2 8,14 24,13 24,13 0,1 3,2 3,2 2,2 2,5 0,7 -10,11 -24,15 -36,16 26,11 54,5 55,5 82,-19 77,-97 77,-97l0 0c0,-2 0,-3 2,-4 2,-3 5,-5 7,-7l0 0zm-84 117c-3,1 -47,9 -79,-15 -2,-2 -2,-5 -1,-7 1,-1 3,-2 5,-2l0 0c0,0 23,4 40,-7 -9,-2 -20,-9 -26,-25 0,-2 1,-5 2,-6 -7,-6 -14,-16 -14,-32 0,-3 2,-5 5,-5l0 0c-5,-9 -9,-24 0,-40 2,-2 5,-3 7,-1 0,0 1,1 1,1 0,0 29,33 64,35 0,-2 0,-3 0,-4 0,-11 5,-21 12,-29l0 0c7,-7 17,-11 28,-11 6,0 11,1 15,3 5,2 9,4 12,7 2,0 5,0 9,-1l0 0c3,-1 7,-3 10,-5 2,-2 5,-2 7,1 0,1 1,2 1,2l0 0c0,1 0,5 -5,11l2 -1c2,-1 5,-1 7,1 1,2 1,4 0,6 -1,2 -5,8 -17,19 0,14 -3,86 -85,105l0 0z',
					'google' => 'M1598 2234c-27,22 -60,39 -99,50l0 0c-36,11 -78,16 -124,17 -46,0 -93,-5 -138,-18 -42,-12 -79,-30 -111,-54l0 1c-35,-25 -62,-54 -80,-87 -18,-34 -28,-71 -28,-111 0,-19 3,-38 7,-57l0 0 0 0c4,-18 11,-35 19,-50 7,-12 15,-25 24,-37 9,-11 19,-22 29,-31l2 -2c10,-8 20,-15 30,-21 11,-7 21,-13 32,-18l2 -1 0 0 20 -8 4 -2 14 -5 5 -2 0 0c18,-5 38,-11 59,-15l1 -1 0 0c19,-4 39,-8 59,-10l6 -1c19,-2 34,-3 43,-3l2 0c11,-1 21,-1 28,0l18 0 2 0 0 0c7,1 15,1 21,2 11,1 21,5 30,12 33,23 61,44 84,62 26,21 47,40 64,57 19,22 35,46 45,73 9,27 15,54 15,83 0,35 -7,68 -22,98 -14,31 -36,57 -63,79l0 0zm408 -1310c-32,0 -58,-26 -58,-58 0,-32 26,-57 58,-57l127 0 0 -128c0,-32 26,-57 58,-57 32,0 57,25 57,57l0 128 128 0c31,0 57,25 57,57 0,32 -26,58 -57,58l-128 0 0 127c0,32 -25,58 -57,58 -32,0 -58,-26 -58,-58l0 -127 -127 0zm-539 1250c24,-6 43,-16 59,-29 14,-12 25,-25 32,-39 6,-14 10,-31 10,-49 0,-15 -2,-28 -6,-40l-1 -2c-5,-12 -12,-24 -21,-34 -13,-14 -31,-30 -53,-47 -20,-16 -42,-33 -68,-51l-17 0c-3,0 -6,0 -9,-1l-12 0c-13,1 -26,2 -39,3 -18,2 -35,6 -52,10 -1,-2 -47,12 -50,13l-10 4 -22 9c-6,3 -11,6 -16,9 -7,4 -13,9 -19,14 -5,4 -10,9 -14,14 -4,6 -9,13 -13,21 -4,7 -8,15 -10,23 -1,0 -2,28 -2,30 0,21 4,39 13,56 10,17 25,33 45,48l0 0 1 1c21,15 46,27 75,35 31,9 66,14 106,14l1 0c35,0 66,-4 92,-12l0 0 0 0 0 0zm-71 -837c-23,0 -45,-3 -67,-11l0 0c-21,-7 -41,-18 -60,-32l-2 -3c-16,-12 -29,-26 -42,-40 -13,-15 -25,-33 -35,-51l-1 -1 0 0c-19,-36 -34,-71 -44,-106 -10,-36 -15,-72 -15,-107l0 -4c0,-26 3,-52 11,-76l0 -2c8,-26 20,-50 35,-73 19,-24 44,-45 72,-58 26,-13 55,-20 85,-20 23,0 46,4 67,11 21,7 40,17 58,29l4 4c15,12 29,26 41,41l0 0c13,16 24,34 34,53l0 2c19,36 32,73 41,109 10,37 15,74 15,111 0,16 -2,37 -4,62l-1 6c-3,15 -8,29 -13,42l0 0c-6,14 -13,28 -22,42 -3,4 -6,8 -10,11 -19,19 -40,34 -64,44 -26,11 -54,16 -83,17l0 0 0 0zm-29 -119c8,3 18,4 29,4l0 0c14,0 26,-3 37,-8 10,-4 19,-10 27,-17 3,-6 7,-12 9,-18l0 0 0 0c3,-6 4,-12 6,-18 2,-18 3,-34 3,-48 0,-28 -4,-56 -11,-83 -7,-29 -18,-58 -33,-87l0 -1c-6,-12 -13,-22 -21,-32 1,-1 -20,-22 -22,-23 -9,-6 -17,-11 -27,-14 -9,-3 -19,-5 -29,-6 -13,0 -26,4 -37,9 -10,5 -20,13 -29,23 -8,11 -14,24 -18,36l0 3c-4,14 -6,28 -6,43l0 5c0,25 4,50 11,76 7,27 19,54 34,83l0 0c6,11 14,22 22,31 8,9 17,18 26,25 9,7 18,13 28,17l0 0 1 0 0 0zm221 -39l0 2 0 -2zm70 502c-45,-40 -100,-83 -126,-116 -11,-15 -20,-28 -26,-45 -6,-16 -9,-34 -9,-53 0,-18 3,-36 9,-53 5,-17 13,-33 23,-47 6,-9 13,-19 21,-29l0 0c8,-11 16,-20 25,-29l3 -3 36 -32 2 -1 30 -29c8,-8 16,-18 25,-29l1 0c8,-10 16,-21 25,-32l1 -2c13,-20 24,-44 31,-70 9,-30 13,-64 14,-101l0 -15c0,-22 -1,-42 -7,-63 -5,-15 -11,-30 -17,-42l0 0c-5,-10 -10,-18 -14,-22l-13 -13c-20,-19 -49,-47 -55,-51 -27,-17 -36,-52 -19,-79 10,-18 29,-28 49,-28l0 0 119 0 30 -39 -363 0c-30,0 -61,2 -92,5 -33,4 -66,9 -99,16l0 0c-32,7 -64,19 -95,35 -31,16 -61,37 -91,61 -44,43 -77,87 -98,134 -21,45 -32,93 -32,144 0,41 7,79 22,115l1 4c15,34 37,66 66,97l2 2c27,32 61,57 101,73 42,17 91,26 147,27 0,0 30,-1 33,-1 13,-1 25,-2 37,-3 32,-4 60,19 64,51 1,8 -1,17 -3,25l-1 1 -14 40 -1 3c-2,3 -3,7 -3,11l-1 2c0,4 -1,10 -1,18 0,13 2,25 4,34 3,10 6,18 11,26 7,12 14,25 22,37 6,10 13,21 21,31 19,26 14,62 -11,81 -11,8 -24,12 -36,11 -26,1 -55,3 -88,6 -32,4 -70,8 -113,15l-113 30c-37,13 -74,31 -111,51l-1 1c-29,18 -54,37 -74,57l-3 2c-18,19 -32,38 -42,59l0 0 0 0c-12,25 -21,47 -26,68 -6,19 -8,37 -8,55 0,36 8,69 24,100 17,31 43,61 78,89l2 1 0 0c35,30 80,52 135,68 58,16 126,25 204,26 94,-2 176,-14 248,-36 69,-21 127,-53 174,-94 45,-39 79,-82 101,-126 22,-43 32,-90 32,-139 1,-31 -4,-65 -12,-95 -8,-27 -19,-50 -32,-69 -18,-23 -37,-45 -57,-65 -20,-22 -42,-42 -66,-61l0 0zm-6 -153l79 64 0 0c27,22 52,45 76,70 23,24 45,49 65,76 24,31 41,69 51,107 10,36 16,77 17,121 4,66 -15,137 -44,195 -29,58 -72,112 -129,162 -59,51 -131,91 -215,117 -81,25 -175,39 -281,41 -79,0 -160,-9 -236,-30 -71,-20 -130,-51 -178,-91 -47,-37 -83,-79 -107,-125 -26,-47 -38,-99 -38,-153 0,-27 4,-56 12,-86 8,-28 19,-58 34,-88l1 0c15,-31 36,-61 62,-88l4 -4c26,-26 58,-50 96,-73l3 -2c42,-24 84,-44 129,-60 43,-16 87,-27 132,-35l4 -1c41,-6 81,-11 118,-15l1 0c-9,-15 -15,-31 -20,-49 -5,-20 -8,-41 -8,-63 0,-11 1,-22 3,-32 -71,-1 -134,-13 -189,-36 -56,-23 -105,-58 -144,-104 -38,-40 -67,-84 -87,-131l-2 -4c-20,-49 -30,-102 -30,-158 0,-67 14,-132 42,-193 28,-59 69,-116 124,-169l0 0 4 -3c37,-30 75,-56 114,-76 39,-20 80,-35 121,-45l0 0 2 0c39,-8 76,-14 111,-18 36,-4 71,-6 104,-6l479 0 0 0c12,0 24,4 35,12 25,19 30,55 10,81l-115 150c-10,16 -28,26 -48,26l-7 0c5,9 11,18 15,28l0 0 0 0c8,17 15,34 22,52 12,34 13,67 13,102l0 17c0,43 -5,89 -17,130 -11,40 -27,75 -48,105l-2 3c-9,13 -19,26 -29,39l-1 1c-9,10 -19,21 -30,33l-2 2 -2 3 -32 29 -3 4 -36 31c-5,6 -10,11 -14,17l0 0 -1 0c-4,6 -10,14 -15,22l-2 3c-4,5 -6,10 -8,15 -2,5 -2,12 -2,19 0,6 0,11 2,15 1,3 2,5 3,7l4 4c6,8 12,15 16,19 3,4 8,9 14,16l0 0z',
					'delicious' => 'M204 133l-71 0 0 71 0 5 -5 0 -76 0 -5 0 0 -5 0 -76 0 -5 5 0 71 0 0 -71 0 -5 5 0 76 0 5 0 0 5 0 76 0 5 -5 0zm-148 67l67 0 0 -67 -67 0 0 67zm77 -77l67 0 0 -67 -67 0 0 67z',
					'linked' => 'M171 204l0 -59c0,-6 -2,-11 -4,-14 -3,-3 -6,-5 -11,-5 -3,0 -6,1 -9,3 -3,2 -5,4 -6,7l0 0c0,0 0,1 0,2 0,1 0,3 0,4l0 62 0 5 -5 0 -31 0 -4 0 0 -5 0 -73 0 0 0 -6c0,-11 0,-20 0,-28l-1 -4 5 0 28 -1 4 0 1 4 0 6c3,-2 6,-5 9,-6 6,-3 13,-5 21,-5l0 0c12,0 23,4 30,12 7,9 12,21 12,38l0 0 0 0 0 63 0 5 -5 0 -30 0 -4 0 0 -5 0 0zm-89 4l-30 0 -5 0 0 -4 0 -108 0 -4 5 0 30 0 5 0 0 4 0 108 0 4 -5 0zm-26 -9l22 0 0 -98 -22 0 0 98zm12 -110c-6,0 -12,-2 -15,-6 -4,-4 -7,-9 -7,-15 0,-6 3,-11 7,-15 3,-4 9,-6 15,-6 7,0 12,2 16,6 4,4 6,9 6,15l0 0c0,6 -2,11 -6,15 -4,4 -10,6 -16,6zm-9 -12c2,2 5,3 9,3 4,0 7,-1 10,-3 2,-2 3,-5 3,-9l0 0c0,-3 -1,-6 -3,-9 -3,-2 -6,-3 -10,-3 -4,0 -7,1 -9,4 -2,2 -4,5 -4,8 0,4 1,7 4,9l0 0zm121 68l0 55 21 0 0 -59 0 0 0 0c0,-15 -4,-25 -10,-32 -5,-6 -14,-9 -23,-9l0 0c-7,0 -12,1 -17,4 -6,3 -10,7 -12,11l-1 2 -3 0 0 0 -4 0 -1 -4 -1 -12 -19 0c0,7 0,15 0,24l0 6 0 0 0 69 22 0 0 -58c0,-1 0,-3 0,-5 0,-1 1,-3 1,-5 2,-4 5,-8 9,-11 4,-2 9,-4 14,-4 8,0 13,3 17,8 4,5 7,12 7,20l0 0z',
					'pin' => 'M120 160c-1,3 -2,6 -3,9l0 2c-1,5 -3,9 -4,14 -2,4 -4,8 -6,12 -2,3 -5,7 -8,11 -2,2 -5,5 -8,3 -2,-1 -3,-3 -3,-5l0 0c-1,-6 -1,-13 0,-18l0 -4c0,-7 2,-14 3,-21l1 -1c1,-6 3,-13 4,-19 2,-6 3,-13 5,-19 0,-1 0,-1 0,-1 0,-1 0,-1 0,-1 -1,-1 -1,-3 -1,-5 -1,-2 -1,-4 -2,-6 0,-2 0,-4 0,-6 0,-3 1,-5 1,-7 1,-4 3,-8 6,-11 2,-3 5,-5 9,-6 2,-1 4,-1 7,-1 2,0 5,1 7,2 2,1 3,2 4,4 2,2 2,4 3,6 1,2 1,5 0,7 0,2 0,4 -1,6 -1,5 -2,9 -3,13 -1,3 -2,6 -3,8l0 1c0,3 -1,6 -1,9 1,1 1,2 2,3 0,1 1,2 2,3 1,0 2,1 4,1 1,1 3,1 4,1 3,0 6,-1 8,-3 3,-1 5,-3 6,-6 3,-3 5,-7 7,-11 2,-5 3,-11 3,-16 0,-2 1,-4 1,-6 0,-2 0,-4 0,-6 -1,-3 -1,-6 -2,-10 -1,-2 -3,-5 -5,-7l0 0c-2,-3 -4,-4 -6,-6 -2,-2 -5,-3 -8,-4 -3,-1 -7,-2 -11,-2 -3,0 -7,0 -11,1 -6,1 -12,3 -17,7 -5,3 -9,8 -11,13 -2,3 -3,6 -4,9 -1,3 -1,7 -1,11 0,2 0,5 1,7 0,2 1,4 2,6 1,1 0,0 1,1 1,1 2,2 2,3l1 0c1,3 0,6 -1,9l0 0c0,1 0,0 0,1 0,1 0,0 0,1 -1,4 -2,8 -7,8 -2,0 -3,0 -4,-1l0 0c-1,-1 -3,-1 -4,-2 -3,-2 -6,-5 -8,-8 -2,-3 -4,-6 -5,-10 -2,-3 -3,-8 -3,-12 0,-4 -1,-9 0,-13 1,-4 2,-8 3,-11 1,-3 2,-7 4,-9 3,-5 6,-10 10,-14 4,-4 8,-7 13,-10 4,-2 8,-4 12,-5 5,-2 10,-3 14,-4 2,0 4,0 5,0 2,0 4,-1 6,-1 5,0 10,0 15,1 4,1 9,3 14,5 4,1 7,3 11,6 3,2 6,5 9,8 3,3 5,6 7,10 2,4 4,8 5,12 1,2 2,5 2,7 0,3 0,6 0,9 0,2 0,5 0,7 0,3 -1,5 -1,8 -1,8 -4,17 -9,25 -4,7 -10,13 -17,17 -2,2 -4,3 -6,4 -2,1 -4,1 -6,2 -2,1 -5,1 -7,1 -3,1 -6,1 -8,1l-1 0c-2,0 -5,-1 -7,-2 -2,0 -4,-1 -7,-2 -1,-1 -3,-2 -4,-3l0 0zm-34 -23c0,-1 1,-2 1,-2 0,-1 0,-1 0,-2 0,0 0,-1 0,-1l0 0c1,-1 1,-3 1,-3l0 0c0,-1 -1,-1 -1,-2 -1,-1 -1,-1 -2,-2 -1,-2 -2,-5 -3,-8 -1,-3 -2,-6 -2,-9 0,-5 1,-9 2,-13 1,-4 2,-7 4,-10 4,-7 8,-12 14,-16 6,-5 13,-7 20,-8 4,-1 9,-1 13,-1 4,0 8,1 12,2 4,1 7,3 10,5 3,2 6,4 8,7l0 0c2,3 4,6 5,10 2,4 3,8 3,12 0,2 0,4 0,6 0,3 0,5 -1,7 0,6 -1,11 -3,17 -2,5 -5,10 -8,14 -2,3 -5,5 -8,7 -3,3 -7,4 -11,4 -3,0 -5,0 -7,-1 -2,0 -4,-1 -6,-3 -2,-1 -3,-2 -4,-4 -1,-1 -2,-3 -3,-6 -1,-4 0,-8 1,-12l0 -1c1,-2 2,-5 3,-8 1,-4 2,-8 3,-12 1,-2 1,-4 1,-5 0,-2 0,-4 0,-5 0,-1 -1,-3 -2,-4 0,-1 -1,-1 -2,-2 -1,0 -2,-1 -4,-1 -1,0 -3,0 -4,1 -2,0 -4,2 -6,4 -2,2 -3,5 -4,8 0,1 0,3 0,5 -1,2 -1,4 0,6 0,1 0,3 1,4 0,2 1,4 1,5l0 0 0 1c0,0 0,1 0,1 0,1 0,2 0,3l0 0c-2,7 -3,13 -5,20 -1,6 -3,12 -4,19l-1 1c-1,7 -3,13 -3,20l0 3c0,4 -1,9 0,14 2,-3 4,-6 6,-9 2,-4 3,-7 5,-11 2,-4 3,-8 4,-12l0 -1 0 -2c1,-3 2,-6 3,-10l1 -6c1,-1 1,-2 2,-2 2,-1 4,-1 5,1 1,1 2,3 3,4 1,1 3,2 4,2 2,1 3,2 5,2 2,1 4,1 6,2l0 0c2,0 5,0 7,-1 2,0 4,-1 6,-1 2,-1 4,-1 5,-2 2,-1 4,-2 5,-3 6,-4 11,-9 15,-15 4,-7 7,-15 8,-23 0,-2 1,-4 1,-6 0,-3 0,-5 0,-7 0,-3 0,-5 0,-8 -1,-2 -1,-4 -2,-6 -1,-4 -2,-7 -4,-10 -2,-4 -4,-6 -6,-9 -3,-3 -5,-5 -8,-7 -3,-2 -7,-4 -10,-6 -4,-1 -8,-3 -13,-4 -4,0 -8,-1 -13,0 -2,0 -3,0 -5,0 -2,0 -3,0 -5,0 -4,1 -8,2 -12,3 -4,2 -8,3 -11,5 -4,3 -8,6 -12,9 -3,4 -6,8 -9,12 -1,3 -2,5 -3,8 -1,3 -2,7 -3,10 0,3 0,8 0,11 1,3 1,7 3,11 1,3 2,6 4,8 2,2 4,4 7,6 0,1 1,1 2,1l0 1c0,0 0,0 0,0l0 0z',
					'password' => 'm191.75,107.75l0,-27c0,-33.55425 -27.19575,-60.75 -60.75,-60.75c-33.55425,0 -60.75,27.19575 -60.75,60.75l0,27c-11.18475,0 -20.25,9.06525 -20.25,20.25l0,20.25l0,6.75l0,13.5l0,6.75c0,33.55425 27.19575,60.75 60.75,60.75l40.5,0c33.55425,0 60.75,-27.19575 60.75,-60.75l0,-6.75l0,-13.5l0,-6.75l0,-20.25c0,-11.1915 -9.072,-20.25 -20.25,-20.25zm-108,-27c0,-26.0955 21.1545,-47.25 47.25,-47.25c26.0955,0 47.25,21.1545 47.25,47.25l0,27l-13.5,0l0,-26.9865c0,-18.6435 -15.1065,-33.75 -33.75,-33.75c-18.6435,0 -33.75,15.1065 -33.75,33.75l0,26.9865l-13.5,0l0,-27zm74.25,0l0,0.02025l0,26.97975l-54,0l0,-26.9865l0,-0.0135c0,-14.91075 12.08925,-27 27,-27c14.91075,0 27,12.08925 27,27zm40.5,67.5l0,6.75l0,13.5l0,6.75c0,26.04825 -21.20175,47.25 -47.25,47.25l-40.5,0c-26.04825,0 -47.25,-21.20175 -47.25,-47.25l0,-6.75l0,-13.5l0,-6.75l0,-20.25c0,-3.726 3.024,-6.75 6.75,-6.75c4.50225,0 8.99775,0 13.5,0l94.5,0c4.4955,0 8.991,0 13.5,0c3.71925,0 6.75,3.024 6.75,6.75l0,20.25zm130,149.25c-7.452,0 -13.5,6.04125 -13.5,13.5c0,4.09725 2.24775,11.88 4.50225,18.036c1.836,5.0085 4.1445,8.9505 8.99775,8.9505c5.2785,0 7.16175,-3.9015 9.0045,-8.883c2.2815,-6.1695 4.4955,-13.99275 4.4955,-18.1035c0,-7.45875 -6.048,-13.5 -13.5,-13.5z'
				)
			);

		}

		public static function get_icon( $icon = '', $type = '', $args = array() ) {

			$icon = self::icon( $icon, $type );

			if ( $icon == '' ) {
				return '';
			}

			$svg = '<svg class="shopkit-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve">';
			$svg .= '<path d="' . $icon . '" />';
			$svg .= '</svg>';

			return apply_filters( 'shopkit_svg_icon', $svg, $icon, $type );

		}

		public static function icon( $icon = '', $type = '' ) {
			if ( array_key_exists( $icon, self::$icons ) && array_key_exists( $type, self::$icons[$icon] ) ) {
				return self::$icons[$icon][$type];
			}
		}

	}

	add_action( 'init', array( 'ShopKit_Icons', 'init' ) );
