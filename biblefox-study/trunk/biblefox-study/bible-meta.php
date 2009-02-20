<?php

/**
 * Array for defining book groups (sets of books)
 */
global $bfox_book_groups;
$bfox_book_groups = array(
'bible' => array('old', 'new', 'apoc'),
'protest' => array('old', 'new'),
'old' => array('moses', 'history', 'wisdom', 'prophets'),
'moses' => range(1, 5),
'history' => range(6, 17),
'wisdom' => range(18, 22),
'prophets' => array('major_prophets', 'minor_prophets'),
'major_prophets' => range(23, 27),
'minor_prophets' => range(28, 39),
'new' => array('gospels', 44, 'paul', 'epistles', 66),
'gospels' => range(40, 43),
'paul' => range(45, 57),
'epistles' => range(58, 65),
'apoc' => range(67, 81)
);

/**
 * Array for defining the names for the book groups defined in $bfox_book_groups
 */
global $bfox_book_group_names;
$bfox_book_group_names = array(
'bible' => array('name' => 'Bible', 'short_name' => 'Bible'),
'protest' => array('name' => 'Protestant Bible', 'short_name' => 'Bible'),
'old' => array('name' => 'Old Testament', 'short_name' => 'Old'),
'moses' => array('name' => 'Books of Moses', 'short_name' => 'Moses'),
'history' => array('name' => 'Books of History', 'short_name' => 'History'),
'wisdom' => array('name' => 'Books of Wisdom', 'short_name' => 'Wisdom'),
'prophets' => array('name' => 'Prophets', 'short_name' => 'Prophets'),
'major_prophets' => array('name' => 'Major Prophets', 'short_name' => 'Maj Prophets'),
'minor_prophets' => array('name' => 'Minor Prophets', 'short_name' => 'Min Prophets'),
'new' => array('name' => 'New Testament', 'short_name' => 'New'),
'gospels' => array('name' => 'Gospels', 'short_name' => 'Gospels'),
'paul' => array('name' => 'Pauline Epistles', 'short_name' => 'Paul'),
'epistles' => array('name' => 'Epistles', 'short_name' => 'Epistles'),
'apoc' => array('name' => 'Apocrypha', 'short_name' => 'Apocrypha')
);

/**
 * Array for defining book information
 */
global $bfox_books;
$bfox_books = array(
'1' => array('name' => 'Genesis', 'wiki_name' => 'Book_of_Genesis', 'short_name' => 'Gen'),
'2' => array('name' => 'Exodus', 'wiki_name' => 'Exodus', 'short_name' => 'Exo'),
'3' => array('name' => 'Leviticus', 'wiki_name' => 'Leviticus', 'short_name' => 'Lev'),
'4' => array('name' => 'Numbers', 'wiki_name' => 'Book_of_Numbers', 'short_name' => 'Num'),
'5' => array('name' => 'Deuteronomy', 'wiki_name' => 'Deuteronomy', 'short_name' => 'Deut'),
'6' => array('name' => 'Joshua', 'wiki_name' => 'Book_of_Joshua', 'short_name' => 'Josh'),
'7' => array('name' => 'Judges', 'wiki_name' => 'Book_of_Judges', 'short_name' => 'Judg'),
'8' => array('name' => 'Ruth', 'wiki_name' => 'Book_of_Ruth', 'short_name' => 'Ruth'),
'9' => array('name' => '1 Samuel', 'wiki_name' => 'Books_of_Samuel', 'short_name' => '1Sam'),
'10' => array('name' => '2 Samuel', 'wiki_name' => 'Books_of_Samuel', 'short_name' => '2Sam'),
'11' => array('name' => '1 Kings', 'wiki_name' => 'Books_of_Kings', 'short_name' => '1Ki'),
'12' => array('name' => '2 Kings', 'wiki_name' => 'Books_of_Kings', 'short_name' => '2Ki'),
'13' => array('name' => '1 Chronicles', 'wiki_name' => 'Books_of_Chronicles', 'short_name' => '1Chr'),
'14' => array('name' => '2 Chronicles', 'wiki_name' => 'Books_of_Chronicles', 'short_name' => '2Chr'),
'15' => array('name' => 'Ezra', 'wiki_name' => 'Book_of_Ezra', 'short_name' => 'Ezra'),
'16' => array('name' => 'Nehemiah', 'wiki_name' => 'Book_of_Nehemiah', 'short_name' => 'Neh'),
'17' => array('name' => 'Esther', 'wiki_name' => 'Book_of_Esther', 'short_name' => 'Esth'),
'18' => array('name' => 'Job', 'wiki_name' => 'Book_of_Job', 'short_name' => 'Job'),
'19' => array('name' => 'Psalm', 'wiki_name' => 'Psalms', 'short_name' => 'Ps'),
'20' => array('name' => 'Proverbs', 'wiki_name' => 'Book_of_Proverbs', 'short_name' => 'Prov'),
'21' => array('name' => 'Ecclesiastes', 'wiki_name' => 'Ecclesiastes', 'short_name' => 'Ecc'),
'22' => array('name' => 'Song of Solomon', 'wiki_name' => 'Song_of_Songs', 'short_name' => 'Song'),
'23' => array('name' => 'Isaiah', 'wiki_name' => 'Book_of_Isaiah', 'short_name' => 'Isa'),
'24' => array('name' => 'Jeremiah', 'wiki_name' => 'Book_of_Jeremiah', 'short_name' => 'Jer'),
'25' => array('name' => 'Lamentations', 'wiki_name' => 'Book_of_Lamentations', 'short_name' => 'Lam'),
'26' => array('name' => 'Ezekiel', 'wiki_name' => 'Book_of_Ezekiel', 'short_name' => 'Ezek'),
'27' => array('name' => 'Daniel', 'wiki_name' => 'Book_of_Daniel', 'short_name' => 'Dan'),
'28' => array('name' => 'Hosea', 'wiki_name' => 'Book_of_Hosea', 'short_name' => 'Hos'),
'29' => array('name' => 'Joel', 'wiki_name' => 'Book_of_Joel', 'short_name' => 'Joel'),
'30' => array('name' => 'Amos', 'wiki_name' => 'Book_of_Amos', 'short_name' => 'Amos'),
'31' => array('name' => 'Obadiah', 'wiki_name' => 'Book_of_Obadiah', 'short_name' => 'Obad'),
'32' => array('name' => 'Jonah', 'wiki_name' => 'Book_of_Jonah', 'short_name' => 'Jnh'),
'33' => array('name' => 'Micah', 'wiki_name' => 'Book_of_Micah', 'short_name' => 'Mic'),
'34' => array('name' => 'Nahum', 'wiki_name' => 'Book_of_Nahum', 'short_name' => 'Nah'),
'35' => array('name' => 'Habakkuk', 'wiki_name' => 'Book_of_Habakkuk', 'short_name' => 'Hab'),
'36' => array('name' => 'Zephaniah', 'wiki_name' => 'Book_of_Zephaniah', 'short_name' => 'Zeph'),
'37' => array('name' => 'Haggai', 'wiki_name' => 'Book_of_Haggai', 'short_name' => 'Hag'),
'38' => array('name' => 'Zechariah', 'wiki_name' => 'Book_of_Zechariah', 'short_name' => 'Zech'),
'39' => array('name' => 'Malachi', 'wiki_name' => 'Book_of_Malachi', 'short_name' => 'Mal'),
'40' => array('name' => 'Matthew', 'wiki_name' => 'Gospel_of_Matthew', 'short_name' => 'Matt'),
'41' => array('name' => 'Mark', 'wiki_name' => 'Gospel_of_Mark', 'short_name' => 'Mark'),
'42' => array('name' => 'Luke', 'wiki_name' => 'Gospel_of_Luke', 'short_name' => 'Luke'),
'43' => array('name' => 'John', 'wiki_name' => 'Gospel_of_John', 'short_name' => 'John'),
'44' => array('name' => 'Acts', 'wiki_name' => 'Acts_of_the_Apostles', 'short_name' => 'Acts'),
'45' => array('name' => 'Romans', 'wiki_name' => 'Epistle_to_the_Romans', 'short_name' => 'Rom'),
'46' => array('name' => '1 Corinthians', 'wiki_name' => 'First_Epistle_to_the_Corinthians', 'short_name' => '1Cor'),
'47' => array('name' => '2 Corinthians', 'wiki_name' => 'Second_Epistle_to_the_Corinthians', 'short_name' => '2Cor'),
'48' => array('name' => 'Galatians', 'wiki_name' => 'Epistle_to_the_Galatians', 'short_name' => 'Gal'),
'49' => array('name' => 'Ephesians', 'wiki_name' => 'Epistle_to_the_Ephesians', 'short_name' => 'Eph'),
'50' => array('name' => 'Philippians', 'wiki_name' => 'Epistle_to_the_Philippians', 'short_name' => 'Phil'),
'51' => array('name' => 'Colossians', 'wiki_name' => 'Epistle_to_the_Colossians', 'short_name' => 'Col'),
'52' => array('name' => '1 Thessalonians', 'wiki_name' => 'First_Epistle_to_the_Thessalonians', 'short_name' => '1Th'),
'53' => array('name' => '2 Thessalonians', 'wiki_name' => 'Second_Epistle_to_the_Thessalonians', 'short_name' => '2Th'),
'54' => array('name' => '1 Timothy', 'wiki_name' => 'First_Epistle_to_Timothy', 'short_name' => '1Tim'),
'55' => array('name' => '2 Timothy', 'wiki_name' => 'Second_Epistle_to_Timothy', 'short_name' => '2Tim'),
'56' => array('name' => 'Titus', 'wiki_name' => 'Epistle_to_Titus', 'short_name' => 'Tit'),
'57' => array('name' => 'Philemon', 'wiki_name' => 'Epistle_to_Philemon', 'short_name' => 'Phm'),
'58' => array('name' => 'Hebrews', 'wiki_name' => 'Epistle_to_the_Hebrews', 'short_name' => 'Heb'),
'59' => array('name' => 'James', 'wiki_name' => 'Epistle_of_James', 'short_name' => 'Jm'),
'60' => array('name' => '1 Peter', 'wiki_name' => 'First_Epistle_of_Peter', 'short_name' => '1Pet'),
'61' => array('name' => '2 Peter', 'wiki_name' => 'Second_Epistle_of_Peter', 'short_name' => '2Pet'),
'62' => array('name' => '1 John', 'wiki_name' => 'First_Epistle_of_John', 'short_name' => '1Jn'),
'63' => array('name' => '2 John', 'wiki_name' => 'Second_Epistle_of_John', 'short_name' => '2Jn'),
'64' => array('name' => '3 John', 'wiki_name' => 'Third_Epistle_of_John', 'short_name' => '3Jn'),
'65' => array('name' => 'Jude', 'wiki_name' => 'Epistle_of_Jude', 'short_name' => 'Jude'),
'66' => array('name' => 'Revelation', 'wiki_name' => 'Book_of_Revelation', 'short_name' => 'Rev'),
'67' => array('name' => 'Tobit', 'wiki_name' => 'Book_of_Tobit', 'short_name' => 'Tob'),
'68' => array('name' => 'Judith', 'wiki_name' => 'Book_of_Judith', 'short_name' => 'Jdth'),
'69' => array('name' => 'Rest of Esther', 'wiki_name' => 'Rest_of_Esther', 'short_name' => 'REst'),
'70' => array('name' => 'Wisdom', 'wiki_name' => 'Book_of_Wisdom', 'short_name' => 'Wis'),
'71' => array('name' => 'Ecclesiasticus', 'wiki_name' => 'Sirach', 'short_name' => 'Sir'),
'72' => array('name' => 'Baruch', 'wiki_name' => 'Book_of_Baruch', 'short_name' => 'Bar'),
'73' => array('name' => 'Letter of Jeremiah', 'wiki_name' => 'Letter_of_Jeremiah', 'short_name' => 'LJe'),
'74' => array('name' => 'Prayer of Azariah', 'wiki_name' => 'The_Prayer_of_Azariah_and_Song_of_the_Three_Holy_Children', 'short_name' => 'PrAz'),
'75' => array('name' => 'Susanna', 'wiki_name' => 'Book_of_Susanna', 'short_name' => 'Sus'),
'76' => array('name' => 'Bel and the Dragon', 'wiki_name' => 'Bel_and_the_Dragon', 'short_name' => 'Bel'),
'77' => array('name' => '1 Maccabees', 'wiki_name' => '1_Maccabees', 'short_name' => '1Mac'),
'78' => array('name' => '2 Maccabees', 'wiki_name' => '2_Maccabees', 'short_name' => '2Mac'),
'79' => array('name' => '1 Esdras', 'wiki_name' => '1_Esdras', 'short_name' => '1Esd'),
'80' => array('name' => 'Prayer of Manasseh', 'wiki_name' => 'Prayer_of_Manasseh', 'short_name' => 'PMan'),
'81' => array('name' => '2 Esdras', 'wiki_name' => '2_Esdras', 'short_name' => '2Esd')
);

global $bfox_syn_prefix;
$bfox_syn_prefix = array();

/**
 * Array for defining synonyms for bible book names
 */
global $bfox_synonyms;
$bfox_synonyms = array(

'0' => array(
'genesis' => '1',
'gen' => '1',
'exod' => '2',
'exo' => '2',
'exodus' => '2',
'leviticus' => '3',
'lev' => '3',
'num' => '4',
'numbers' => '4',
'deuteronomy' => '5',
'deut' => '5',
'deu' => '5',
'jsh' => '6',
'jos' => '6',
'josh' => '6',
'joshua' => '6',
'judges' => '7',
'judg' => '7',
'jdg' => '7',
'jdgs' => '7',
'rut' => '8',
'rth' => '8',
'ruth' => '8',
'first samuel' => '9',
'1st samuel' => '9',
'i samuel' => '9',
'1sam' => '9',
'i sam' => '9',
'1sa' => '9',
'1 sm' => '9',
'i sa' => '9',
'1samuel' => '9',
'1 sa' => '9',
'1 sam' => '9',
'1 samuel' => '9',
'2sam' => '10',
'ii samuel' => '10',
'2samuel' => '10',
'2nd samuel' => '10',
'second samuel' => '10',
'ii sam' => '10',
'2sa' => '10',
'2 sm' => '10',
'ii sa' => '10',
'2 sa' => '10',
'2 sam' => '10',
'2 samuel' => '10',
'1kings' => '11',
'1st kgs' => '11',
'1st kings' => '11',
'first kings' => '11',
'first kgs' => '11',
'1kin' => '11',
'i kings' => '11',
'1ki' => '11',
'i ki' => '11',
'1 kings' => '11',
'1 kgs' => '11',
'1 ki' => '11',
'i kgs' => '11',
'1kgs' => '11',
'2kings' => '12',
'2nd kgs' => '12',
'2nd kings' => '12',
'second kings' => '12',
'second kgs' => '12',
'2kin' => '12',
'ii kings' => '12',
'2ki' => '12',
'ii ki' => '12',
'2 kings' => '12',
'2 kgs' => '12',
'2 ki' => '12',
'ii kgs' => '12',
'2kgs' => '12',
'i chron' => '13',
'1chron' => '13',
'i chronicles' => '13',
'1chronicles' => '13',
'1st chronicles' => '13',
'first chronicles' => '13',
'1chr' => '13',
'i chr' => '13',
'1 chronicles' => '13',
'1 chron' => '13',
'1 ch' => '13',
'i ch' => '13',
'1ch' => '13',
'1 chr' => '13',
'second chronicles' => '14',
'2nd chronicles' => '14',
'2chronicles' => '14',
'ii chronicles' => '14',
'2chron' => '14',
'ii chron' => '14',
'2chr' => '14',
'ii chr' => '14',
'2ch' => '14',
'ii ch' => '14',
'2 ch' => '14',
'2 chron' => '14',
'2 chronicles' => '14',
'ezra' => '15',
'ezr' => '15',
'neh' => '16',
'nehemiah' => '16',
'esther' => '17',
'esth' => '17',
'est' => '17',
'job' => '18',
'pss' => '19',
'psm' => '19',
'psa' => '19',
'psalms' => '19',
'pslm' => '19',
'psalm' => '19',
'pro' => '20',
'prv' => '20',
'prov' => '20',
'proverbs' => '20',
'ecc' => '21',
'qoheleth' => '21',
'qoh' => '21',
'eccles' => '21',
'ecclesiastes' => '21',
'sng' => '22',
'sos' => '22',
'song of songs' => '22',
'canticles' => '22',
'canticle of canticles' => '22',
'song' => '22',
'song of solomon' => '22',
'isaiah' => '23',
'isa' => '23',
'jer' => '24',
'jeremiah' => '24',
'lamentations' => '25',
'lam' => '25',
'ezk' => '26',
'eze' => '26',
'ezek' => '26',
'ezekiel' => '26',
'dan' => '27',
'daniel' => '27',
'hosea' => '28',
'hos' => '28',
'jol' => '29',
'joe' => '29',
'joel' => '29',
'amos' => '30',
'amo' => '30',
'oba' => '31',
'obad' => '31',
'obadiah' => '31',
'jonah' => '32',
'jnh' => '32',
'jon' => '32',
'micah' => '33',
'mic' => '33',
'nam' => '34',
'nah' => '34',
'nahum' => '34',
'habakkuk' => '35',
'hab' => '35',
'zephaniah' => '36',
'zeph' => '36',
'zep' => '36',
'hag' => '37',
'haggai' => '37',
'zechariah' => '38',
'zech' => '38',
'zec' => '38',
'mal' => '39',
'malachi' => '39',
'matthew' => '40',
'matt' => '40',
'mat' => '40',
'mrk' => '41',
'mark' => '41',
'luke' => '42',
'luk' => '42',
'jhn' => '43',
'john' => '43',
'acts' => '44',
'act' => '44',
'rom' => '45',
'romans' => '45',
'first corinthians' => '46',
'1st corinthians' => '46',
'1corinthians' => '46',
'i corinthians' => '46',
'1cor' => '46',
'i cor' => '46',
'1co' => '46',
'i co' => '46',
'1 co' => '46',
'1 cor' => '46',
'1 corinthians' => '46',
'ii corinthians' => '47',
'2corinthians' => '47',
'2nd corinthians' => '47',
'second corinthians' => '47',
'2cor' => '47',
'ii cor' => '47',
'2co' => '47',
'ii co' => '47',
'2 co' => '47',
'2 cor' => '47',
'2 corinthians' => '47',
'gal' => '48',
'galatians' => '48',
'ephesians' => '49',
'ephes' => '49',
'eph' => '49',
'philippians' => '50',
'phil' => '50',
'php' => '50',
'col' => '51',
'colossians' => '51',
'first thessalonians' => '52',
'1st thessalonians' => '52',
'1thessalonians' => '52',
'i thessalonians' => '52',
'1thess' => '52',
'i thess' => '52',
'1thes' => '52',
'i thes' => '52',
'1th' => '52',
'i th' => '52',
'1 th' => '52',
'1 thess' => '52',
'1 thessalonians' => '52',
'2thess' => '53',
'ii thessalonians' => '53',
'2thessalonians' => '53',
'2nd thessalonians' => '53',
'second thessalonians' => '53',
'ii thess' => '53',
'2thes' => '53',
'ii thes' => '53',
'2 thessalonians' => '53',
'2 thess' => '53',
'2 th' => '53',
'ii th' => '53',
'2th' => '53',
'first timothy' => '54',
'1st timothy' => '54',
'1timothy' => '54',
'i timothy' => '54',
'1tim' => '54',
'i tim' => '54',
'1ti' => '54',
'i ti' => '54',
'1 ti' => '54',
'1 tim' => '54',
'1 timothy' => '54',
'ii timothy' => '55',
'2timothy' => '55',
'2nd timothy' => '55',
'second timothy' => '55',
'2tim' => '55',
'ii tim' => '55',
'2ti' => '55',
'ii ti' => '55',
'2 ti' => '55',
'2 tim' => '55',
'2 timothy' => '55',
'tit' => '56',
'titus' => '56',
'philemon' => '57',
'philem' => '57',
'phm' => '57',
'hebrews' => '58',
'heb' => '58',
'jas' => '59',
'james' => '59',
'first peter' => '60',
'1st peter' => '60',
'1peter' => '60',
'i peter' => '60',
'1pt' => '60',
'1 pt' => '60',
'i pt' => '60',
'1pet' => '60',
'1 peter' => '60',
'1 pet' => '60',
'1 pe' => '60',
'i pe' => '60',
'1pe' => '60',
'i pet' => '60',
'2 pt' => '61',
'2pt' => '61',
'ii peter' => '61',
'2peter' => '61',
'2nd peter' => '61',
'second peter' => '61',
'ii pt' => '61',
'2pet' => '61',
'2 peter' => '61',
'2 pet' => '61',
'2 pe' => '61',
'ii pe' => '61',
'2pe' => '61',
'ii pet' => '61',
'1 jhn' => '62',
'1jhn' => '62',
'i john' => '62',
'1john' => '62',
'1st john' => '62',
'first john' => '62',
'i jhn' => '62',
'1joh' => '62',
'i joh' => '62',
'1 john' => '62',
'1 jn' => '62',
'i jn' => '62',
'1jn' => '62',
'i jo' => '62',
'1jo' => '62',
'2 jhn' => '63',
'2jhn' => '63',
'ii john' => '63',
'2john' => '63',
'2nd john' => '63',
'second john' => '63',
'ii jhn' => '63',
'2joh' => '63',
'ii joh' => '63',
'2 john' => '63',
'2 jn' => '63',
'ii jn' => '63',
'2jn' => '63',
'ii jo' => '63',
'2jo' => '63',
'3 jhn' => '64',
'3jhn' => '64',
'iii john' => '64',
'3john' => '64',
'3rd john' => '64',
'third john' => '64',
'iii jhn' => '64',
'3joh' => '64',
'iii joh' => '64',
'3jo' => '64',
'iii jo' => '64',
'3jn' => '64',
'iii jn' => '64',
'3 jn' => '64',
'3 john' => '64',
'jud' => '65',
'jude' => '65',
'revelation' => '66',
'rev' => '66',
'the revelation' => '66',
'tob' => '67',
'tobit' => '67',
'judith' => '68',
'jdth' => '68',
'jdt' => '68',
'jth' => '68',
'esg' => '69',
'addesth' => '69',
'aes' => '69',
'the rest of esther' => '69',
'add es' => '69',
'add esth' => '69',
'additions to esther' => '69',
'rest of esther' => '69',
'wis' => '70',
'wisd of sol' => '70',
'wisdom of solomon' => '70',
'wisdom' => '70',
'ecclus' => '71',
'sir' => '71',
'sirach' => '71',
'ecclesiasticus' => '71',
'baruch' => '72',
'bar' => '72',
'ltr jer' => '73',
'lje' => '73',
'let jer' => '73',
'letter of jeremiah' => '73',
'song of three jews' => '74',
'song of three children' => '74',
'song of thr' => '74',
'song of the three holy children' => '74',
'the song of three jews' => '74',
'the song of the three holy children' => '74',
'azariah' => '74',
'pr az' => '74',
'the song of three youths' => '74',
'song thr' => '74',
'song of three' => '74',
'song of three youths' => '74',
'prayer of azariah' => '74',
'susanna' => '75',
'sus' => '75',
'bel' => '76',
'bel and the dragon' => '76',
'first maccabees' => '77',
'1st maccabees' => '77',
'1maccabees' => '77',
'i maccabees' => '77',
'1macc' => '77',
'i macc' => '77',
'1mac' => '77',
'i mac' => '77',
'1 maccabees' => '77',
'1 macc' => '77',
'1 mac' => '77',
'i ma' => '77',
'1ma' => '77',
'ii macc' => '78',
'2macc' => '78',
'ii maccabees' => '78',
'2maccabees' => '78',
'2nd maccabees' => '78',
'second maccabees' => '78',
'2mac' => '78',
'ii mac' => '78',
'2 maccabees' => '78',
'2 macc' => '78',
'2 mac' => '78',
'ii ma' => '78',
'2ma' => '78',
'first esdras' => '79',
'1st esdras' => '79',
'1esdras' => '79',
'i esdras' => '79',
'1esdr' => '79',
'i esdr' => '79',
'1esd' => '79',
'i esd' => '79',
'1es' => '79',
'i es' => '79',
'1 esd' => '79',
'1 esdr' => '79',
'1 esdras' => '79',
'prayer of manasses' => '80',
'pma' => '80',
'pr man' => '80',
'pr of man' => '80',
'prayer of manasseh' => '80',
'2nd esdras' => '81',
'2esdras' => '81',
'ii esdras' => '81',
'2esdr' => '81',
'ii esdr' => '81',
'2esd' => '81',
'ii esd' => '81',
'2es' => '81',
'ii es' => '81',
'2 esd' => '81',
'2 esdr' => '81',
'2 esdras' => '81',
'second esdras' => '81'
),

'1' => array(
'ge' => '1',
'gn' => '1',
'ex' => '2',
'le' => '3',
'lv' => '3',
'nb' => '4',
'nm' => '4',
'nu' => '4',
'dt' => '5',
'jg' => '7',
'ru' => '8',
'1s' => '9',
'2s' => '10',
'1k' => '11',
'2k' => '12',
'ne' => '16',
'es' => '17',
'jb' => '18',
'ps' => '19',
'pr' => '20',
'ec' => '21',
'so' => '22',
'is' => '23',
'jr' => '24',
'je' => '24',
'la' => '25',
'dn' => '27',
'da' => '27',
'ho' => '28',
'jl' => '29',
'am' => '30',
'ob' => '31',
'na' => '34',
'zp' => '36',
'hg' => '37',
'zc' => '38',
'ml' => '39',
'mt' => '40',
'mr' => '41',
'mk' => '41',
'lk' => '42',
'jn' => '43',
'ac' => '44',
'rm' => '45',
'ro' => '45',
'ga' => '48',
'jm' => '59',
're' => '66',
'tb' => '67',
'ws' => '70',
'1m' => '77',
'2m' => '78'
)

);

/* Functions used to generate the initial arrays:

function print_array_decl($array, $level = 0)
{
	$elements = array();
	foreach ($array as $key => $value)
	{
		if (is_array($value)) $value = print_array_decl($value, $level + 1);
		else $value = "'$value'";
		$elements []= "'$key' => $value";
	}

	if (0 >= $level) $glue = ",\n";
	else $glue = ', ';

	return 'array(' . implode($glue, $elements) . ')';
}

function print_books_array_decl()
{
	global $wpdb;
	$arrays = $wpdb->get_results("SELECT * FROM " . BFOX_BOOKS_TABLE, ARRAY_A);

	$books = array();
	foreach ($arrays as $array)
	{
		$id = $array['id'];
		unset($array['id']);
		$books[$id] = $array;
	}
	echo "\n" . print_array_decl($books);
}

function print_syns_array_decl()
{
	global $wpdb;
	$arrays = $wpdb->get_results("SELECT * FROM " . BFOX_SYNONYMS_TABLE . " ORDER BY book_id ASC", ARRAY_A);

	$books1 = array();
	$books2 = array();
	foreach ($arrays as $array)
	{
		$syn = $array['synonym'];
		if (2 < strlen($syn))
			$books1[$syn] = $array['book_id'];
		else
			$books2[$syn] = $array['book_id'];
	}
	echo "\n" . print_array_decl(array($books1, $books2), -1);
//	echo "\n" . print_array_decl($books2);
}

*/

?>