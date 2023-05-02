<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1],
            /* SUBDIRECTOR */
            ['role_id' => 4, 'user_id' => 4],
            /* DIRECTORES */
            ['role_id' => 2, 'user_id' => 2],
            ['role_id' => 3, 'user_id' => 3],
            /* COORDINADORES */
            ['role_id' => 5, 'user_id' => 5],
            ['role_id' => 6, 'user_id' => 6],
            ['role_id' => 9, 'user_id' => 9],
            /* GENERAL */
            ['role_id' => 7, 'user_id' => 7],
            ['role_id' => 8, 'user_id' => 8],
            ['role_id' => 10, 'user_id' => 10],
            ['role_id' => 11, 'user_id' => 11],
            ['role_id' => 12, 'user_id' => 12],
            //PRUEBA
            ['role_id' => 3,'user_id' => 13],
            ['role_id' => 4,'user_id' => 14],
            ['role_id' => 4,'user_id' => 15],
            ['role_id' => 4,'user_id' => 16],
            ['role_id' => 4,'user_id' => 17],
            ['role_id' => 8,'user_id' => 18],
            ['role_id' => 8,'user_id' => 19],
            ['role_id' => 8,'user_id' => 20],
            ['role_id' => 8,'user_id' => 21],
            ['role_id' => 8,'user_id' => 22],
            ['role_id' => 8,'user_id' => 23],
            ['role_id' => 8,'user_id' => 24],
            ['role_id' => 10,'user_id' => 25],
            ['role_id' => 10,'user_id' => 26],
            ['role_id' => 12,'user_id' => 27],
            ['role_id' => 12,'user_id' => 28],
            ['role_id' => 12,'user_id' => 29],
            ['role_id' => 12,'user_id' => 30],
            ['role_id' => 12,'user_id' => 31],
            ['role_id' => 12,'user_id' => 32],
            ['role_id' => 12,'user_id' => 33],
            ['role_id' => 12,'user_id' => 34],
            ['role_id' => 12,'user_id' => 35],
            ['role_id' => 12,'user_id' => 36],
            ['role_id' => 12,'user_id' => 37],
            ['role_id' => 12,'user_id' => 38],
            ['role_id' => 12,'user_id' => 39],
            ['role_id' => 12,'user_id' => 40],
            ['role_id' => 12,'user_id' => 41],
            ['role_id' => 12,'user_id' => 42],
            ['role_id' => 12,'user_id' => 43],
            ['role_id' => 12,'user_id' => 44],
            ['role_id' => 12,'user_id' => 45],
            ['role_id' => 12,'user_id' => 46],
            ['role_id' => 12,'user_id' => 47],
            ['role_id' => 12,'user_id' => 48],
            ['role_id' => 12,'user_id' => 49],
            ['role_id' => 12,'user_id' => 50],
            ['role_id' => 12,'user_id' => 51],
            ['role_id' => 12,'user_id' => 52],
            ['role_id' => 12,'user_id' => 53],
            ['role_id' => 12,'user_id' => 54],
            ['role_id' => 12,'user_id' => 55],
            ['role_id' => 12,'user_id' => 56],
            ['role_id' => 12,'user_id' => 57],
            ['role_id' => 12,'user_id' => 58],
            ['role_id' => 12,'user_id' => 59],
            ['role_id' => 12,'user_id' => 60],
            ['role_id' => 12,'user_id' => 61],
            ['role_id' => 10,'user_id' => 62],
            ['role_id' => 12,'user_id' => 63],
            ['role_id' => 12,'user_id' => 64],
            ['role_id' => 12,'user_id' => 65],
            ['role_id' => 12,'user_id' => 66],
            ['role_id' => 12,'user_id' => 67],
            ['role_id' => 12,'user_id' => 68],
            ['role_id' => 12,'user_id' => 69],
            ['role_id' => 12,'user_id' => 70],
            ['role_id' => 12,'user_id' => 71],
            ['role_id' => 12,'user_id' => 72],
            ['role_id' => 12,'user_id' => 73],
            ['role_id' => 12,'user_id' => 74],
            ['role_id' => 12,'user_id' => 75],
            ['role_id' => 12,'user_id' => 76],
            ['role_id' => 12,'user_id' => 77],
            ['role_id' => 12,'user_id' => 78],
            ['role_id' => 12,'user_id' => 79],
            ['role_id' => 12,'user_id' => 80],
            ['role_id' => 12,'user_id' => 81],
            ['role_id' => 12,'user_id' => 82],
            ['role_id' => 12,'user_id' => 83],
            ['role_id' => 10,'user_id' => 84],
            ['role_id' => 12,'user_id' => 85],
            ['role_id' => 12,'user_id' => 86],
            ['role_id' => 12,'user_id' => 87],
            ['role_id' => 12,'user_id' => 88],
            ['role_id' => 12,'user_id' => 89],
            ['role_id' => 12,'user_id' => 90],
            ['role_id' => 12,'user_id' => 91],
            ['role_id' => 12,'user_id' => 92],
            ['role_id' => 12,'user_id' => 93],
            ['role_id' => 12,'user_id' => 94],
            ['role_id' => 12,'user_id' => 95],
            ['role_id' => 12,'user_id' => 96],
            ['role_id' => 12,'user_id' => 97],
            ['role_id' => 12,'user_id' => 98],
            ['role_id' => 12,'user_id' => 99],
            ['role_id' => 12,'user_id' => 100],
            ['role_id' => 10,'user_id' => 101],
            ['role_id' => 12,'user_id' => 102],
            ['role_id' => 12,'user_id' => 103],
            ['role_id' => 12,'user_id' => 104],
            ['role_id' => 12,'user_id' => 105],
            ['role_id' => 12,'user_id' => 106],
            ['role_id' => 12,'user_id' => 107],
            ['role_id' => 12,'user_id' => 108],
            ['role_id' => 12,'user_id' => 109],
            ['role_id' => 12,'user_id' => 110],
            ['role_id' => 12,'user_id' => 111],
            ['role_id' => 12,'user_id' => 112],
            ['role_id' => 12,'user_id' => 113],
            ['role_id' => 12,'user_id' => 114],
            ['role_id' => 12,'user_id' => 115],
            ['role_id' => 12,'user_id' => 116],
            ['role_id' => 12,'user_id' => 117],
            ['role_id' => 12,'user_id' => 118],
            ['role_id' => 12,'user_id' => 119],
            ['role_id' => 10,'user_id' => 120],
            ['role_id' => 10,'user_id' => 121],
            ['role_id' => 10,'user_id' => 122],
            ['role_id' => 12,'user_id' => 123],
            ['role_id' => 12,'user_id' => 124],
            ['role_id' => 12,'user_id' => 125],
            ['role_id' => 12,'user_id' => 126],
            ['role_id' => 12,'user_id' => 127],
            ['role_id' => 12,'user_id' => 128],
            ['role_id' => 12,'user_id' => 129],
            ['role_id' => 12,'user_id' => 130],
            ['role_id' => 12,'user_id' => 131],
            ['role_id' => 12,'user_id' => 132],
            ['role_id' => 12,'user_id' => 133],
            ['role_id' => 12,'user_id' => 134],
            ['role_id' => 12,'user_id' => 135],
            ['role_id' => 12,'user_id' => 136],
            ['role_id' => 12,'user_id' => 137],
            ['role_id' => 12,'user_id' => 138],
            ['role_id' => 12,'user_id' => 139],
            ['role_id' => 12,'user_id' => 140],
            ['role_id' => 12,'user_id' => 141],
            ['role_id' => 12,'user_id' => 142],
            ['role_id' => 10,'user_id' => 143],
            ['role_id' => 12,'user_id' => 144],
            ['role_id' => 12,'user_id' => 145],
            ['role_id' => 12,'user_id' => 146],
            ['role_id' => 12,'user_id' => 147],
            ['role_id' => 12,'user_id' => 148],
            ['role_id' => 12,'user_id' => 149],
            ['role_id' => 12,'user_id' => 150],
            ['role_id' => 12,'user_id' => 151],
            ['role_id' => 12,'user_id' => 152],
            ['role_id' => 12,'user_id' => 153],
            ['role_id' => 12,'user_id' => 154],
            ['role_id' => 12,'user_id' => 155],
            ['role_id' => 12,'user_id' => 156],
            ['role_id' => 12,'user_id' => 157],
            ['role_id' => 12,'user_id' => 158],
            ['role_id' => 12,'user_id' => 159],
            ['role_id' => 12,'user_id' => 160],
            ['role_id' => 12,'user_id' => 161],
            ['role_id' => 12,'user_id' => 162],
            ['role_id' => 12,'user_id' => 163],
            ['role_id' => 12,'user_id' => 164],
            ['role_id' => 12,'user_id' => 165],
            ['role_id' => 12,'user_id' => 166],
            ['role_id' => 12,'user_id' => 167],
            ['role_id' => 12,'user_id' => 168],
            ['role_id' => 12,'user_id' => 169],
            ['role_id' => 12,'user_id' => 170],
            ['role_id' => 12,'user_id' => 171],
            ['role_id' => 12,'user_id' => 172],
            ['role_id' => 12,'user_id' => 173],
            ['role_id' => 12,'user_id' => 174],
            ['role_id' => 12,'user_id' => 175],
            ['role_id' => 10,'user_id' => 176],
            ['role_id' => 12,'user_id' => 177],
            ['role_id' => 12,'user_id' => 178],
            ['role_id' => 12,'user_id' => 179],
            ['role_id' => 12,'user_id' => 180],
            ['role_id' => 12,'user_id' => 181],
            ['role_id' => 12,'user_id' => 182],
            ['role_id' => 12,'user_id' => 183],
            ['role_id' => 12,'user_id' => 184],
            ['role_id' => 12,'user_id' => 185],
            ['role_id' => 12,'user_id' => 186],
            ['role_id' => 12,'user_id' => 187],
            ['role_id' => 12,'user_id' => 188],
            ['role_id' => 12,'user_id' => 189],
            ['role_id' => 12,'user_id' => 190],
            ['role_id' => 12,'user_id' => 191],
            ['role_id' => 12,'user_id' => 192],
            ['role_id' => 12,'user_id' => 193],
            ['role_id' => 12,'user_id' => 194],
            ['role_id' => 12,'user_id' => 195],
            ['role_id' => 12,'user_id' => 196],
            ['role_id' => 12,'user_id' => 197],
            ['role_id' => 12,'user_id' => 198],
            ['role_id' => 12,'user_id' => 199],
            ['role_id' => 12,'user_id' => 200],
            ['role_id' => 12,'user_id' => 201],
            ['role_id' => 12,'user_id' => 202],
            ['role_id' => 12,'user_id' => 203],
            ['role_id' => 12,'user_id' => 204],
            ['role_id' => 12,'user_id' => 205],
            ['role_id' => 12,'user_id' => 206],
            ['role_id' => 12,'user_id' => 207],
            ['role_id' => 12,'user_id' => 208],
            ['role_id' => 12,'user_id' => 209],
            ['role_id' => 12,'user_id' => 210],
            ['role_id' => 12,'user_id' => 211],
            ['role_id' => 12,'user_id' => 212],
            ['role_id' => 12,'user_id' => 213],
            ['role_id' => 12,'user_id' => 214],
            ['role_id' => 12,'user_id' => 215],
            ['role_id' => 10,'user_id' => 216],
            ['role_id' => 10,'user_id' => 217],
            ['role_id' => 10,'user_id' => 218],
            ['role_id' => 8,'user_id' => 219],
            ['role_id' => 10,'user_id' => 220],
            ['role_id' => 10,'user_id' => 221],
            ['role_id' => 10,'user_id' => 222],
            ['role_id' => 10,'user_id' => 223],
            ['role_id' => 12,'user_id' => 224],
            ['role_id' => 12,'user_id' => 225],
            ['role_id' => 12,'user_id' => 226],
            ['role_id' => 12,'user_id' => 227],
            ['role_id' => 12,'user_id' => 228],
            ['role_id' => 12,'user_id' => 229],
            ['role_id' => 12,'user_id' => 230],
            ['role_id' => 12,'user_id' => 231],
            ['role_id' => 12,'user_id' => 232],
            ['role_id' => 12,'user_id' => 233],
            ['role_id' => 12,'user_id' => 234],
            ['role_id' => 12,'user_id' => 235],
            ['role_id' => 12,'user_id' => 236],
            ['role_id' => 10,'user_id' => 237],
            ['role_id' => 12,'user_id' => 238],
            ['role_id' => 12,'user_id' => 239],
            ['role_id' => 12,'user_id' => 240],
            ['role_id' => 12,'user_id' => 241],
            ['role_id' => 12,'user_id' => 242],
            ['role_id' => 12,'user_id' => 243],
            ['role_id' => 12,'user_id' => 244],
            ['role_id' => 12,'user_id' => 245],
            ['role_id' => 12,'user_id' => 246],
            ['role_id' => 12,'user_id' => 247],
            ['role_id' => 12,'user_id' => 248],
            ['role_id' => 12,'user_id' => 249],
            ['role_id' => 12,'user_id' => 250],
            ['role_id' => 12,'user_id' => 251],
            ['role_id' => 12,'user_id' => 252],
            ['role_id' => 12,'user_id' => 253],
            ['role_id' => 12,'user_id' => 254],
            ['role_id' => 12,'user_id' => 255],
            ['role_id' => 12,'user_id' => 256],
            ['role_id' => 12,'user_id' => 257],
            ['role_id' => 12,'user_id' => 258],
            ['role_id' => 12,'user_id' => 259],
            ['role_id' => 12,'user_id' => 260],
            ['role_id' => 12,'user_id' => 261],
            ['role_id' => 12,'user_id' => 262],
            ['role_id' => 12,'user_id' => 263],
            ['role_id' => 12,'user_id' => 264],
            ['role_id' => 12,'user_id' => 265],
            ['role_id' => 12,'user_id' => 266],
            ['role_id' => 12,'user_id' => 267],
            ['role_id' => 12,'user_id' => 268],
            ['role_id' => 12,'user_id' => 269],
            ['role_id' => 12,'user_id' => 270],
            ['role_id' => 12,'user_id' => 271],
            ['role_id' => 12,'user_id' => 272],
            ['role_id' => 12,'user_id' => 273],
            ['role_id' => 12,'user_id' => 274],
            ['role_id' => 12,'user_id' => 275],
            ['role_id' => 12,'user_id' => 276],
            ['role_id' => 12,'user_id' => 277],
            ['role_id' => 12,'user_id' => 278],
            ['role_id' => 12,'user_id' => 279],
            ['role_id' => 12,'user_id' => 280],
            ['role_id' => 12,'user_id' => 281],
            ['role_id' => 12,'user_id' => 282],
            ['role_id' => 12,'user_id' => 283],
            ['role_id' => 12,'user_id' => 284],
            ['role_id' => 12,'user_id' => 285],
            ['role_id' => 12,'user_id' => 286],
            ['role_id' => 12,'user_id' => 287],
            ['role_id' => 12,'user_id' => 288],
            ['role_id' => 12,'user_id' => 289],
            ['role_id' => 12,'user_id' => 290],
            ['role_id' => 12,'user_id' => 291],
            ['role_id' => 12,'user_id' => 292],
            ['role_id' => 12,'user_id' => 293],
            ['role_id' => 12,'user_id' => 294],
            ['role_id' => 12,'user_id' => 295],
            ['role_id' => 12,'user_id' => 296],
            ['role_id' => 12,'user_id' => 297],
            ['role_id' => 12,'user_id' => 298],
            ['role_id' => 12,'user_id' => 299],
            ['role_id' => 12,'user_id' => 300],
            ['role_id' => 12,'user_id' => 301],
            ['role_id' => 12,'user_id' => 302],
            ['role_id' => 12,'user_id' => 303],
            ['role_id' => 12,'user_id' => 304],
            ['role_id' => 12,'user_id' => 305],
            ['role_id' => 12,'user_id' => 306],
            ['role_id' => 12,'user_id' => 307],
            ['role_id' => 12,'user_id' => 308],
            ['role_id' => 12,'user_id' => 309],
            ['role_id' => 12,'user_id' => 310],
            ['role_id' => 12,'user_id' => 311],
            ['role_id' => 12,'user_id' => 312],
            ['role_id' => 12,'user_id' => 313],
            ['role_id' => 12,'user_id' => 314],
            ['role_id' => 12,'user_id' => 315],
            ['role_id' => 12,'user_id' => 316],
            ['role_id' => 12,'user_id' => 317],
            ['role_id' => 12,'user_id' => 318],
            ['role_id' => 6,'user_id' => 319],
            ['role_id' => 11,'user_id' => 320],
            ['role_id' => 11,'user_id' => 321],
            ['role_id' => 11,'user_id' => 322],
            ['role_id' => 11,'user_id' => 323],
            ['role_id' => 11,'user_id' => 324],
            ['role_id' => 11,'user_id' => 325],
            ['role_id' => 11,'user_id' => 326],
            ['role_id' => 11,'user_id' => 327],
            ['role_id' => 12,'user_id' => 328],
            ['role_id' => 10,'user_id' => 329],
            ['role_id' => 12,'user_id' => 330],
            ['role_id' => 12,'user_id' => 331],
            ['role_id' => 12,'user_id' => 332],
            ['role_id' => 12,'user_id' => 333],
            ['role_id' => 12,'user_id' => 334],
            ['role_id' => 12,'user_id' => 335],
            ['role_id' => 12,'user_id' => 336],
            ['role_id' => 12,'user_id' => 337],
            ['role_id' => 12,'user_id' => 338],
            ['role_id' => 12,'user_id' => 339],
            ['role_id' => 12,'user_id' => 340],
            ['role_id' => 12,'user_id' => 341],
            ['role_id' => 12,'user_id' => 342],
            ['role_id' => 12,'user_id' => 343],
            ['role_id' => 12,'user_id' => 344],
            ['role_id' => 12,'user_id' => 345],
            ['role_id' => 12,'user_id' => 346],
            ['role_id' => 12,'user_id' => 347],
            ['role_id' => 12,'user_id' => 348],
            ['role_id' => 12,'user_id' => 349],
            ['role_id' => 12,'user_id' => 350],
            ['role_id' => 12,'user_id' => 351],
            ['role_id' => 12,'user_id' => 352],
            ['role_id' => 12,'user_id' => 353],
            ['role_id' => 12,'user_id' => 354],
            ['role_id' => 12,'user_id' => 355],
            ['role_id' => 12,'user_id' => 356],
            ['role_id' => 12,'user_id' => 357],
            ['role_id' => 12,'user_id' => 358],
            ['role_id' => 12,'user_id' => 359],
            ['role_id' => 12,'user_id' => 360],
            ['role_id' => 12,'user_id' => 361],
            ['role_id' => 9,'user_id' => 362],
            ['role_id' => 12,'user_id' => 363],
            ['role_id' => 10,'user_id' => 364],
            ['role_id' => 9,'user_id' => 365],
            ['role_id' => 9,'user_id' => 366],
            ['role_id' => 9,'user_id' => 367],
            ['role_id' => 9,'user_id' => 368],
            ['role_id' => 9,'user_id' => 369],
            ['role_id' => 9,'user_id' => 370],
            ['role_id' => 9,'user_id' => 371],
            ['role_id' => 12,'user_id' => 372],
            ['role_id' => 12,'user_id' => 373],
            ['role_id' => 12,'user_id' => 374],
            ['role_id' => 12,'user_id' => 375],
            ['role_id' => 12,'user_id' => 376],
            ['role_id' => 12,'user_id' => 377],
            ['role_id' => 12,'user_id' => 378],
            ['role_id' => 12,'user_id' => 379],
            ['role_id' => 12,'user_id' => 380],
            ['role_id' => 12,'user_id' => 381],
            ['role_id' => 12,'user_id' => 382],
            ['role_id' => 12,'user_id' => 383],
            ['role_id' => 12,'user_id' => 384],
            ['role_id' => 12,'user_id' => 385],
            ['role_id' => 12,'user_id' => 386],
            ['role_id' => 12,'user_id' => 387],
            ['role_id' => 12,'user_id' => 388],
            ['role_id' => 12,'user_id' => 389],
            ['role_id' => 12,'user_id' => 390],
            ['role_id' => 12,'user_id' => 391],
            ['role_id' => 12,'user_id' => 392],
            ['role_id' => 12,'user_id' => 393],
            ['role_id' => 12,'user_id' => 394],
            ['role_id' => 12,'user_id' => 395],
            ['role_id' => 12,'user_id' => 396],
            ['role_id' => 12,'user_id' => 397],
            ['role_id' => 12,'user_id' => 398],
            ['role_id' => 12,'user_id' => 399],
            ['role_id' => 12,'user_id' => 400],
            ['role_id' => 12,'user_id' => 401],
            ['role_id' => 12,'user_id' => 402],
            ['role_id' => 12,'user_id' => 403],
            ['role_id' => 10,'user_id' => 404],
            ['role_id' => 8,'user_id' => 405],
            ['role_id' => 8,'user_id' => 406],
            ['role_id' => 8,'user_id' => 407],
            ['role_id' => 10,'user_id' => 408],
            ['role_id' => 12,'user_id' => 409],
            ['role_id' => 12,'user_id' => 410],
            ['role_id' => 12,'user_id' => 411],
            ['role_id' => 12,'user_id' => 412],
            ['role_id' => 12,'user_id' => 413],
            ['role_id' => 12,'user_id' => 414],
            ['role_id' => 12,'user_id' => 415],
            ['role_id' => 12,'user_id' => 416],
            ['role_id' => 12,'user_id' => 417],
            ['role_id' => 12,'user_id' => 418],
            ['role_id' => 12,'user_id' => 419],
            ['role_id' => 12,'user_id' => 420],
            ['role_id' => 12,'user_id' => 421],
            ['role_id' => 7,'user_id' => 422],
            ['role_id' => 12,'user_id' => 423],
            ['role_id' => 12,'user_id' => 424],
            ['role_id' => 12,'user_id' => 425],
            ['role_id' => 12,'user_id' => 426],
            ['role_id' => 12,'user_id' => 427],
            ['role_id' => 12,'user_id' => 428],
            ['role_id' => 12,'user_id' => 429],
            ['role_id' => 12,'user_id' => 430],
            ['role_id' => 12,'user_id' => 431],
            ['role_id' => 12,'user_id' => 432],
            ['role_id' => 10,'user_id' => 433],
            ['role_id' => 12,'user_id' => 434],
            ['role_id' => 12,'user_id' => 435],
            ['role_id' => 12,'user_id' => 436],
            ['role_id' => 12,'user_id' => 437],

            
        ]);
    }
}
