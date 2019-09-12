var CANVAS_WIDTH = 1920;
var CANVAS_HEIGHT = 1080;

var EDGEBOARD_X = 250;
var EDGEBOARD_Y = 80;

var PRIMARY_FONT = "Arial";
var SECONDARY_FONT = "Army";

var FPS           = 30;
var FPS_TIME      = 1000/FPS;
var DISABLE_SOUND_MOBILE = false;


var STATE_LOADING = 0;
var STATE_MENU    = 1;
var STATE_HELP    = 1;
var STATE_GAME    = 3;

var ON_MOUSE_DOWN  = 0;
var ON_MOUSE_UP    = 1;
var ON_MOUSE_OVER  = 2;
var ON_MOUSE_OUT   = 3;
var ON_DRAG_START  = 4;
var ON_DRAG_END    = 5;

var MODE_CLASSIC = 0;
var MODE_ADVANCED = 1;

var PLAYER = 0;
var OPPONENT = 1;

var SHIPS_TYPE = [SHIP_CARRIER, SHIP_BATTLE, SHIP_LONG, SHIP_MEDIUM, SHIP_SUB, SHIP_SMALL];

var MISSILE_TYPE_NORMAL = 0;
var MISSILE_TYPE_TORPEDO = 1;
var MISSILE_TYPE_AIRSTRIKE = 2;

var SEA_PIECE_DIM = 512;

var NUM_CELL = 14;
var TOT_CELL = 196;      
var BOARD_LENGTH  = 710;
var BOARD_REG_POINTS = {x:237, y: 286};
var CELL_LENGTH   = BOARD_LENGTH/NUM_CELL;

var CONTROL_CELL_DIM = 52;

var CELL_STATE_VOID = "void";
var CELL_STATE_HIT = "hit";
var CELL_STATE_SUNK = "sunk";
var CELL_STATE_WATER = "water";

var AI_STATE_NEW_COORDINATE = 0;
var AI_STATE_FIND_SHIP_NEIGHBOR = 1;
var AI_FIND_DIRECTION = 2;
var AI_FOLLOW_DIRECTION = 3;
var AI_REVERSE_DIRECTION = 4;
var AI_FOLLOW_REVERSE = 5;
var AI_FOLLOW_CARRIER = 6;

var PREDICT_WATER = 0;
var PREDICT_HIT = 1;
var PREDICT_SUNK = 2;

var COST_AIRSTRIKE = 100;
var COST_RADAR = 200;

var NUM_BOMB_AIRSTRIKE = 5;

var MIN_AI_THINKING   = 1000;
var MAX_AI_THINKING   = 1500;

var POINTS_TO_LOSE;
var POINTS_EARNED;
var AD_SHOW_COUNTER;

var ENABLE_FULLSCREEN;
var ENABLE_CHECK_ORIENTATION;