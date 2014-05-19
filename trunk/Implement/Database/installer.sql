# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-05-19 15:42:33
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for qnbrandt_tea
DROP DATABASE IF EXISTS `qnbrandt_tea`;
CREATE DATABASE IF NOT EXISTS `qnbrandt_tea` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `qnbrandt_tea`;


# Dumping structure for table qnbrandt_tea.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_fields` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.categories: ~5 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`cate_id`, `cate_name`, `cate_description`, `cate_fields`, `lang_id`) VALUES
	(2, 'test', 'test 2', 'a:2:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}}', 1),
	(3, 'Nice', 'Nice', 'a:2:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}}', 1),
	(5, 'yellow tea', 'yellow tea', 'a:2:{s:5:"label";a:1:{i:0;s:1:"s";}s:5:"field";a:1:{i:0;s:1:"s";}}', 1),
	(7, 'tesssssssssssssssss', 'test', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1),
	(8, 'Gaiwan 2', '', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}', 1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.category_languages
DROP TABLE IF EXISTS `category_languages`;
CREATE TABLE IF NOT EXISTS `category_languages` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `cate_name` varchar(250) NOT NULL,
  `cate_description` text NOT NULL,
  `cate_fields` text NOT NULL,
  PRIMARY KEY (`cal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table qnbrandt_tea.category_languages: ~3 rows (approximately)
/*!40000 ALTER TABLE `category_languages` DISABLE KEYS */;
INSERT INTO `category_languages` (`cal_id`, `cate_id`, `lang_id`, `cate_name`, `cate_description`, `cate_fields`) VALUES
	(1, 2, 2, 'ក្រុមតែបៃតង', 'នេះជាក្រុមតែបៃតង', 'a:2:{s:5:"label";a:1:{i:0;s:39:"ព័ត៌មានសង្ខេប";}s:5:"field";a:1:{i:0;s:48:"នេះជាក្រុមតែបៃតង";}}'),
	(2, 3, 2, 'ផលិតផលល្អ', 'នេះជាផលិតផលល្អ', 'a:2:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}}'),
	(3, 7, 3, 'tesssssssssssssssss', 'test', 'a:2:{s:5:"label";b:0;s:5:"field";b:0;}');
/*!40000 ALTER TABLE `category_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.contents
DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cont_description` text COLLATE utf8_unicode_ci,
  `men_id` int(11) NOT NULL,
  `lang_id` smallint(11) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.contents: ~4 rows (approximately)
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` (`cont_id`, `cont_name`, `cont_description`, `men_id`, `lang_id`) VALUES
	(1, 'Welcome', '<p>home content edited! ddd</p>', 1, 1),
	(2, 'About', '<p>About us</p>', 2, 1),
	(3, 'Contact', '<p>Catact ussdfjsdljf</p>', 3, 1),
	(4, 'Services', '<p>this is the sevices. En</p>', 4, 1);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.content_languages
DROP TABLE IF EXISTS `content_languages`;
CREATE TABLE IF NOT EXISTS `content_languages` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cont_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`col_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.content_languages: 8 rows
/*!40000 ALTER TABLE `content_languages` DISABLE KEYS */;
INSERT INTO `content_languages` (`col_id`, `lang_id`, `cont_id`, `cont_name`, `cont_description`) VALUES
	(1, 3, 4, 'Services ch', '<p>this is the sevices. ch</p>'),
	(2, 2, 4, 'សេវាកម្ម', '<p>គេហទំព័រសេវាកម្ម</p>'),
	(3, 2, 1, 'ទំព័រដើម', '<p><br />នោះហើយជាមូលហេតុដែលយើងធ្វើឱ្យវាជាអាទិភាពរបស់យើងផងដែរ។ គំនូរលើបទពិសោធជាច្រើនទសវត្សរ៍មកហើយនៅក្នុងឧស្សាហកម្មនេះយើងបានប្រភពល្អ, តែគ្រិស្តអូស្សូដក់ផលិតពីជុំវិញពិភពលោក។<br /><br />ជួររបស់យើងរួមបញ្ចូលទាំងការតែពណ៌បៃតងពណ៌ខ្មៅនិងពណ៌ស oolong និង infusions ។ មិនមែនបង្ហាញពីការជ្រើសរើសនៃការ caddies ទាន់សម័យរបស់យើងនិងេ្រគងបនអនុវត្តជាក់ស្តែង។<br /><br />ស្វែងយល់ច្រើនទៀតពីយើងនោះនិងផលិតផលរបស់យើង។ - See more at: http://localhost/brand-tea-web-site/Implement/qnbrandtea.com/#sthash.4coB26HQ.dpuf</p>'),
	(4, 3, 1, 'Welcome CH', '<p>home content​ CH</p>'),
	(5, 2, 2, 'អំពីយើង', '<p><span id="result_box" lang="km"><span class="hps">Poptea</span> <span class="hps">គឺជា</span><wbr />គំនិត<wbr />ថ្មីនិង<wbr />ទាន់សម័យ<wbr />នៃ<wbr />តែនិង<wbr />បង្អែម<wbr />ហាង<wbr />សម្រាប់<wbr />ជំនាន់ថ្មីនៃ<wbr />ប្រទេសកម្ពុជា។ <span class="hps">Poptea</span> <span class="hps">ផ្តល់នូវ</span><wbr />បរិស្ថាន<wbr />ទំនើបនិង<wbr />កក់ក្ដៅ<wbr />ដែលនឹង<wbr />បញ្ចូល<wbr />ការ<wbr />ទាក់ទាញ<wbr />ធម្មជាតិ<wbr />នៃទីក្រុង<wbr />និងគំនិត<wbr />អន្តរជាតិ។ <span class="hps">Poptea</span> <span class="hps">មាន</span><wbr />លាយ<wbr />មួយ<wbr />នៃឧបករណ៍<wbr />ប្រពៃណី<wbr />និងមានឧបករណ៍ទំនើប<wbr />ដើម្បីធានា<wbr />ការរចនា<wbr />និងរសជាតិ<wbr />ដ៏អស្ចារ្យ<wbr />ដ៏អស្ចារ្យ។ </span></p>\n<p><span id="result_box" lang="km"><br /><strong><span class="hps">បេសកកម្ម</span><wbr />របស់យើង </strong></span></p>\n<p><span id="result_box" lang="km"><br /><wbr /><span class="hps">បេសកកម្ម</span><wbr />របស់ <span class="hps">Poptea</span> <span class="hps">គឺដើម្បី</span><wbr />ផ្ដល់<wbr />តែ<wbr />ពពុះ<wbr />តៃវ៉ាន់<wbr />ដ៏ល្អបំផុត<wbr />និងពិសេស<wbr />ដល់ប្រជាជនកម្ពុជាហើយ<wbr />ភ្ញៀវទេសចរ<wbr />អន្តរជាតិ។ <span class="hps">ជាមួយនឹងការ</span><wbr />លាយ<wbr />មួយ<wbr />នៃ<wbr />ផាសុខភាព<wbr />បរិស្ថាន<wbr />ស្អាត<wbr />និងរូបមន្ត<wbr />ដ៏អស្ចារ្យ។&nbsp;</span></p>\n<p><span id="result_box" lang="km"><strong><wbr /><span class="hps">គោលដៅរបស់យើង</span> </strong></span></p>\n<p><span id="result_box" lang="km"><br /><wbr /><span class="hps">គោលបំណង</span><wbr />របស់យើងគឺដើម្បី<wbr />បញ្ចូល<wbr />ផ្លែឈើ<wbr />ធម្មជាតិក្នុងមូលដ្ឋាន<wbr />ស្រស់<wbr />តែ<wbr />អន្តរជាតិនិង<wbr />ព្រឹត្តិការណ៍<wbr />សម័យទំនើប<wbr />ចូលទៅក្នុង<wbr />ពែង<wbr />របស់អ្នក។ <span class="hps">យើងចង់ឱ្យ</span><wbr />ពែង<wbr />តែមួយ<wbr />ដើម្បីនាំមកនូវ<wbr />ស្នាមញញឹម<wbr />ក្នុងខ្លួនអ្នក។ <br /><br /><wbr /><span class="hps">យើងជា</span><wbr />ខ្មែរ។ <span class="hps">យើងគាំទ្រ</span><wbr />សិល្បករសិល្បការិនី<wbr />ខ្មែរ។ <span class="hps">សូមអរគុណដល់</span><wbr />គំរូ<wbr />របស់យើង:</span></p>'),
	(6, 2, 3, 'Contact', '<p><span id="result_box" lang="km"><span title="Member of Triple 888 Trading Group Co., Ltd\n">សមាជិកនៃ បីដង 888 ជួញដូរ គ្រុបខូ អិលធីឌី<br /></span><span title="Corporate outlets:\n\n&nbsp;&nbsp;&nbsp;&nbsp;">ហាងលក់ សាជីវកម្ម :<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #1 POPTEA KC: Kids City, #162A, Sihanouk Boulevard, 4th floor, Phnom Penh, Cambodia\n&nbsp;&nbsp;&nbsp;&nbsp;">សាខា # 1 POPTEA KC : កុមារ ទីក្រុង # 162a អ្នក , មហាវិថី ព្រះសីហនុ ជាន់ ទី 4 , រាជធានីភ្នំពេញ, ប្រទេសកម្ពុជា<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Opening Hour:\n&nbsp;&nbsp;&nbsp;&nbsp;">ចាប់បើកពីម៉ោង :<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Mon to Fri 8am &ndash; 9pm and Sat to Sun 8am &ndash; 10pm\n&nbsp;&nbsp;&nbsp;&nbsp;">មន សុស ដើម្បី ម៉ោង 8 ព្រឹក - ម៉ោង 9 យប់ និង ម៉ោង 8 ព្រឹក សៅរ៍ ដើម្បី ស៊ុន - ម៉ោង 10 យប់<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 10 259 526 / +855 92 259 527\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">+855 10 259 526</span></span></span></span> / <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">855 92 259 527</span></span></span></span><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #2 POPTEA NM: Phnom Penh Night Market\n&nbsp;&nbsp;&nbsp;&nbsp;">សាខា # 2 POPTEA NM : ផ្សាររាត្រី រាជធានីភ្នំពេញ<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 10 258 826\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">+855 10 258 826</span></span></span></span><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #3 POPTEA TK: TK Avenue &ndash; (Coming Soon)\n&nbsp;&nbsp;&nbsp;&nbsp;">សាខា # 3 TK POPTEA : TK Avenue - ( មក មិនយូរមិនឆាប់ )<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Head Office: #26, street 99, Sankat Boeung Trabek, Khan Chamkarmon, Phnom Penh, Cambodia\n&nbsp;&nbsp;&nbsp;&nbsp;">ការិយាល័យកណ្តាល : # 26 , ផ្លូវ 99 , សង្កាត់ បឹងត្របែក ខ័ណ្ឌ ចំការមន , រាជធានីភ្នំពេញ, ប្រទេសកម្ពុជា<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 23 638 8848\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: +855 23 638 8848<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 97 888 4822\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: +855 97 888 4822<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 97 888 4833\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: +855 97 888 4833<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 70 699 929\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: +855 70 699 929<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 78 699 929\n\n">ទូរស័ព្ទ: +855 78 699 929<br /></span><span title="Franchise outlets:\n\n&nbsp;&nbsp;&nbsp;&nbsp;">ហាងលក់ យីហោ:<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #4 POPTEA CTM: #99, Preah Norodom, Sangkat Beoung Raing, Khan Daun Penh, 12211 Phnom Penh\n&nbsp;&nbsp;&nbsp;&nbsp;">សាខា # 4 POPTEA CTM : # 99 , មហាវិថីព្រះនរោត្តម , សង្កាត់ បឹង បឹងរាំង , ខណ្ឌ ដូនពេញ, រាជធានីភ្នំពេញ 12211<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Opening Hour: Mon to Sat 8am &ndash; 10pm\n&nbsp;&nbsp;&nbsp;&nbsp;">ចាប់បើកពីម៉ោង : មន ដើម្បី សៅរ៍ ម៉ោង 8 ព្រឹក - ម៉ោង 10 យប់<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 17 933 351 / +855 97 933 3516\n&nbsp;&nbsp;&nbsp;&nbsp;">ទូរស័ព្ទ: +855 17 933 351 / +855 97 933 3516<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #5 POPTEA SOK: Sen Sok Hospital, # 91-96, street 1986, Phnom Penh (Coming Soon)\n&nbsp;&nbsp;&nbsp;&nbsp;">សាខា # 5 POPTEA សុខ : មន្ទីរពេទ្យ សែន សុខ , # 91-96 , ផ្លូវលេខ 1986 , រាជធានី ភ្នំពេញ ( មក មិនយូរមិនឆាប់ )<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 15 542 020 / +855 17 228 862\n\n">ទូរស័ព្ទ: <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">+855 15 542 020</span></span></span></span> / +855 17 228 862<br /></span><span title="Delivery : +855 70 699 929 / +855 78 699 929\n">ការផ្តល់ លេខ +855 70 699 929 / 855 78 699 929<br /></span><span title="E-mail: info@popteacambodia.com">E-mail: info@popteacambodia.com</span></span></p>\n<div id="skype_c2c_menu_container" class="skype_c2c_menu_container" style="display: none;">\n<div class="skype_c2c_menu_click2call"><a id="skype_c2c_menu_click2call_action" class="skype_c2c_menu_click2call_action"></a>Call</div>\n<div class="skype_c2c_menu_click2sms"><a id="skype_c2c_menu_click2sms_action" class="skype_c2c_menu_click2sms_action"></a>Send SMS</div>\n<div class="skype_c2c_menu_add2skype"><a id="skype_c2c_menu_add2skype_text" class="skype_c2c_menu_add2skype_text"></a>Add to Skype</div>\n<div class="skype_c2c_menu_toll_info"><span class="skype_c2c_menu_toll_callcredit">You\'ll need Skype Credit</span><span class="skype_c2c_menu_toll_free">Free via Skype</span></div>\n</div>'),
	(7, 3, 2, '關於我們', '<p><span id="result_box" lang="zh-TW">Poptea是茶和甜點店為新一代柬埔寨的一個新的和時髦的概念。 <span class="hps">Poptea</span>提供一個現代化的，舒適的環境，融入城市和國際化理念的自然魅力。 <span class="hps">Poptea</span>具有傳統工具和現代的設備組合，以確保出色的設計和一流的品味。 <br /><br /><strong>我們的使命</strong> <br /><br />Poptea的使命是提供最好的和獨特的台灣泡沫紅茶到柬埔寨和國際遊客。融合了舒適，整潔的環境和偉大的食譜。 <br /><br /><strong>我們的目標</strong> <br /><br />我們的目標是融入了當地的自然新鮮水果，國際茶和現代風味在你的杯子。我們希望每一個單杯帶來你一個微笑。 <br /><br />我們是高棉。我們支持高棉藝術家。感謝您對我們的模型：</span></p>'),
	(8, 3, 3, 'Contact', '<p><span id="result_box" lang="zh-TW"><span title="Member of Triple 888 Trading Group Co., Ltd\n">三人間888貿易集團有限公司的成員<br /></span><span title="Corporate outlets:\n\n&nbsp;&nbsp;&nbsp;&nbsp;">公司網點：<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #1 POPTEA KC: Kids City, #162A, Sihanouk Boulevard, 4th floor, Phnom Penh, Cambodia\n&nbsp;&nbsp;&nbsp;&nbsp;">科＃ 1 POPTEA KC ：孩子城市， ＃ 162A ，西哈努克大道， 4樓，金邊，柬埔寨<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Opening Hour:\n&nbsp;&nbsp;&nbsp;&nbsp;">營業時間：<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Mon to Fri 8am &ndash; 9pm and Sat to Sun 8am &ndash; 10pm\n&nbsp;&nbsp;&nbsp;&nbsp;">週一至週五上午8時 - 晚上9點，週六至週日上午8時 - 晚上10時<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 10 259 526 / +855 92 259 527\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">+855 10 259 526</span></span></span></span> / <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">855 92 259 527</span></span></span></span><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #2 POPTEA NM: Phnom Penh Night Market\n&nbsp;&nbsp;&nbsp;&nbsp;">科＃ 2 POPTEA NM ：金邊夜市<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 10 258 826\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">+855 10 258 826</span></span></span></span><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #3 POPTEA TK: TK Avenue &ndash; (Coming Soon)\n&nbsp;&nbsp;&nbsp;&nbsp;">科＃ 3 POPTEA TK ： TK大道 - （即將推出）<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Head Office: #26, street 99, Sankat Boeung Trabek, Khan Chamkarmon, Phnom Penh, Cambodia\n&nbsp;&nbsp;&nbsp;&nbsp;">總公司： ＃ 26街99 ， Sankat Boeung德羅貝，汗Chamkarmon ，金邊，柬埔寨<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 23 638 8848\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： +855 23 638 8848<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 97 888 4822\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： +855 97 888 4822<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 97 888 4833\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： +855 97 888 4833<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 70 699 929\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： +855 70 699 929<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 78 699 929\n\n">電話： +855 78 699 929<br /><br /></span><span title="Franchise outlets:\n\n&nbsp;&nbsp;&nbsp;&nbsp;">專營店：<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #4 POPTEA CTM: #99, Preah Norodom, Sangkat Beoung Raing, Khan Daun Penh, 12211 Phnom Penh\n&nbsp;&nbsp;&nbsp;&nbsp;">科＃ 4 POPTEA CTM ： ＃ 99 ，柏威夏諾羅敦，鄉務Beoung Raing ，汗道恩金邊， 12211金邊<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Opening Hour: Mon to Sat 8am &ndash; 10pm\n&nbsp;&nbsp;&nbsp;&nbsp;">營業時間：週一至週六上午8時 - 晚上10時<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 17 933 351 / +855 97 933 3516\n&nbsp;&nbsp;&nbsp;&nbsp;">電話： +855 17 933 351 / 855 97 933 3516<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Branch #5 POPTEA SOK: Sen Sok Hospital, # 91-96, street 1986, Phnom Penh (Coming Soon)\n&nbsp;&nbsp;&nbsp;&nbsp;">科＃ 5 POPTEA SOK ：森索醫院​​， ＃ 91-96 ，街道1986年，金邊（即將推出）<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span title="Tel: +855 15 542 020 / +855 17 228 862\n\n">電話： <span class="skype_c2c_container" dir="ltr" tabindex="-1"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" /><span class="skype_c2c_text_span">+855 15 542 020</span></span></span></span> / 855 17 228 862<br /><br /></span><span title="Delivery : +855 70 699 929 / +855 78 699 929\n">交貨： +855 70 699 929 / 855 78 699 929<br /></span><span title="E-mail: info@popteacambodia.com">電子郵件： info@popteacambodia.com</span></span></p>\n<p>&nbsp;</p>\n<div class="skype_c2c_menu_toll_info">&nbsp;</div>\n<div id="skype_c2c_menu_container" class="skype_c2c_menu_container" style="display: none;">\n<div class="skype_c2c_menu_click2call"><a id="skype_c2c_menu_click2call_action" class="skype_c2c_menu_click2call_action"></a>Call</div>\n<div class="skype_c2c_menu_click2sms"><a id="skype_c2c_menu_click2sms_action" class="skype_c2c_menu_click2sms_action"></a>Send SMS</div>\n<div class="skype_c2c_menu_add2skype"><a id="skype_c2c_menu_add2skype_text" class="skype_c2c_menu_add2skype_text"></a>Add to Skype</div>\n<div class="skype_c2c_menu_toll_info"><span class="skype_c2c_menu_toll_callcredit">You\'ll need Skype Credit</span><span class="skype_c2c_menu_toll_free">Free via Skype</span></div>\n</div>');
/*!40000 ALTER TABLE `content_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.con_slideshow
DROP TABLE IF EXISTS `con_slideshow`;
CREATE TABLE IF NOT EXISTS `con_slideshow` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` int(10) DEFAULT NULL,
  `sli_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table qnbrandt_tea.con_slideshow: ~0 rows (approximately)
/*!40000 ALTER TABLE `con_slideshow` DISABLE KEYS */;
/*!40000 ALTER TABLE `con_slideshow` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.groups: ~3 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`gro_id`, `gro_name`, `gro_description`, `cate_id`, `lang_id`) VALUES
	(4, 'tea', 'tea', 2, 1),
	(5, 'green tea', 'green tea', 3, 1),
	(6, 'testssssssssssssssssss', 'test test test', 7, 1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.group_languages
DROP TABLE IF EXISTS `group_languages`;
CREATE TABLE IF NOT EXISTS `group_languages` (
  `grl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gro_description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`grl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

# Dumping data for table qnbrandt_tea.group_languages: ~2 rows (approximately)
/*!40000 ALTER TABLE `group_languages` DISABLE KEYS */;
INSERT INTO `group_languages` (`grl_id`, `lang_id`, `gro_id`, `gro_name`, `gro_description`) VALUES
	(2, 2, 5, 'តែបៃតង', 'តែបៃតង'),
	(3, 2, 4, 'តែ', 'តែ');
/*!40000 ALTER TABLE `group_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.languages
DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.languages: ~3 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_description`) VALUES
	(1, 'English', 'en'),
	(2, 'Khmer', 'kh'),
	(3, 'Chiness', 'ch');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `men_order` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` smallint(6) NOT NULL,
  PRIMARY KEY (`men_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.menus: ~0 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.photos
DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `pho_id` int(11) NOT NULL AUTO_INCREMENT,
  `pho_url` text NOT NULL,
  `pho_des` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pho_is_main_photo` int(11) NOT NULL,
  PRIMARY KEY (`pho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

# Dumping data for table qnbrandt_tea.photos: ~33 rows (approximately)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`pho_id`, `pho_url`, `pho_des`, `pro_id`, `pho_is_main_photo`) VALUES
	(1, 'chinese_sage_1_21.jpg', '', 1, 1),
	(3, 'dragon_well_tea_2_2.jpg', '', 2, 1),
	(8, 'silver_needle_tea.jpg', '', 4, 1),
	(11, '587.jpg', '', 5, 1),
	(13, 'Lighthouse.jpg', '', 6, 1),
	(14, 'Chrysanthemum1.jpg', '', 6, 0),
	(15, 'Desert1.jpg', '', 6, 0),
	(16, 'Hydrangeas.jpg', '', 6, 0),
	(17, 'Koala3.jpg', '', 6, 0),
	(18, 'Lighthouse1.jpg', '', 6, 0),
	(19, 'Penguins2.jpg', '', 6, 0),
	(40, 'Chrysanthemum2.jpg', '', 17, 1),
	(41, 'Koala4.jpg', '', 17, 0),
	(56, 'dragon_well_tea_2_21.jpg', '', 25, 1),
	(58, 'Tulips1.jpg', '', 26, 1),
	(59, 'Koala6.jpg', '', 26, 0),
	(60, 'Lighthouse2.jpg', '', 27, 1),
	(61, 'Lighthouse3.jpg', '', 27, 0),
	(62, 'Koala7.jpg', '', 28, 1),
	(63, 'Koala8.jpg', '', 28, 0),
	(64, 'Lighthouse4.jpg', '', 28, 0),
	(65, 'Penguins3.jpg', '', 28, 0),
	(66, 'Lighthouse5.jpg', '', 29, 1),
	(67, 'Koala9.jpg', '', 29, 0),
	(68, 'Lighthouse6.jpg', '', 30, 1),
	(69, 'Penguins4.jpg', '', 30, 0),
	(70, 'Desert2.jpg', '', 32, 1),
	(72, 'Koala11.jpg', '', 32, 0),
	(73, 'chinese_sage_1_2.jpg', '', 1, 0),
	(74, 'dragonwell_tea_1_2.jpg', '', 2, 0),
	(75, 'yinzhen_white_tea_1.jpg', '', 4, 0),
	(76, 'dragonwell_tea_1_21.jpg', '', 25, 0),
	(78, '751.jpg', '', 5, 0);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_price` text COLLATE utf8_unicode_ci,
  `pro_qty` text COLLATE utf8_unicode_ci,
  `pro_fields` text COLLATE utf8_unicode_ci,
  `gro_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `pro_related` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_des` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_knowledge_related` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.products: ~14 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`pro_id`, `pro_name`, `pro_price`, `pro_qty`, `pro_fields`, `gro_id`, `lang_id`, `pro_related`, `pro_des`, `pro_knowledge_related`) VALUES
	(1, 'Green Tea on Cambodia2', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'b:0;', '<p>sdfdf</p>', 'b:0;'),
	(2, 'Japanese Kyusu Clay Tea Pot', 'a:2:{s:5:"price";s:3:"111";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"111";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'a:1:{i:0;s:1:"1";}', '<p>test</p>', 'a:2:{i:0;s:1:"6";i:1;s:1:"5";}'),
	(4, 'Green tea', 'a:2:{s:5:"price";s:4:"1200";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"1200";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}', 5, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '<p>test</p>', 'b:0;'),
	(5, 'While tea', 'a:2:{s:5:"price";s:1:"2";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:1:"2";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";b:0;s:5:"field";b:0;s:9:"hide_show";b:0;}', 6, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '<p>2</p>', 'b:0;'),
	(6, 'test2', 'a:2:{s:5:"price";s:2:"33";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:2:"33";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:4:"ssss";i:1;s:3:"sss";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}', 5, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '<p>test</p>', 'a:1:{i:0;s:1:"4";}'),
	(17, 'product 12222222222', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'b:0;', '<p>asaas</p>', 'b:0;'),
	(25, 'Green Tea test', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'b:0;', '<p>test</p>', 'b:0;'),
	(26, 'again', 'a:2:{s:5:"price";s:3:"111";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"111";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'a:1:{i:0;s:1:"1";}', '<p>wwww www www ww www www www</p>', 'b:0;'),
	(27, 'Green Tea213eqwewqe', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"show";i:2;s:4:"show";}}', 5, 1, 'b:0;', '<p>test</p>', 'b:0;'),
	(28, 'best', 'a:2:{s:5:"price";s:4:"1200";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'b:0;', '<p>test</p>', 'b:0;'),
	(29, 'tst', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"show";i:2;s:4:"show";}}', 5, 1, 'a:1:{i:0;s:1:"1";}', '<p>test</p>', 'b:0;'),
	(30, 'product for test', 'a:2:{s:5:"price";s:3:"200";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"200";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}', 4, 1, 'a:1:{i:0;s:1:"1";}', '<p>test</p>', 'b:0;'),
	(31, 'Sencha, The most popular green tea', 'a:2:{s:5:"price";s:2:"10";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:3:"100";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";b:0;s:5:"field";b:0;s:9:"hide_show";b:0;}', 5, 1, 'b:0;', '<p>test</p>', 'b:0;'),
	(32, 'Green Tea1111', 'a:2:{s:5:"price";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:2:{s:3:"qty";s:4:"2500";s:9:"hide_show";s:4:"show";}', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"show";i:2;s:4:"show";}}', 5, 1, 'a:1:{i:0;s:1:"6";}', '<p>sdfasdfsdaf</p>', 'b:0;');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.product_languages
DROP TABLE IF EXISTS `product_languages`;
CREATE TABLE IF NOT EXISTS `product_languages` (
  `prl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(250) NOT NULL,
  `pro_des` text NOT NULL,
  `pro_fields` text NOT NULL,
  PRIMARY KEY (`prl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

# Dumping data for table qnbrandt_tea.product_languages: ~7 rows (approximately)
/*!40000 ALTER TABLE `product_languages` DISABLE KEYS */;
INSERT INTO `product_languages` (`prl_id`, `lang_id`, `pro_id`, `pro_name`, `pro_des`, `pro_fields`) VALUES
	(3, 2, 25, 'តែបៃតង', '<p>តែបៃតង</p>', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"hide";i:1;s:4:"show";i:2;s:4:"hide";}}'),
	(4, 2, 1, 'តែបៃតង', '<p>តែបៃតង</p>', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:18:"ផលិតផល";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}'),
	(5, 2, 2, 'សាក', '<p>test</p>', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:9:"សាក";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}'),
	(6, 2, 4, 'សាក', '<p>សាក</p>\r\n<p><img src="http://localhost/tea/Implement/qnbrandtea.com/uploads/tinymce/uploads/green-tea.jpg" alt="" width="448" height="327" /></p>', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:1:"1";i:1;s:4:"good";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}'),
	(7, 2, 5, 'កកកក', '<p>កកកកក</p>', 'a:3:{s:5:"label";b:0;s:5:"field";b:0;s:9:"hide_show";b:0;}'),
	(8, 2, 6, 'កកក', '<p>កកក</p>\r\n<p>កកក</p>', 'a:3:{s:5:"label";a:3:{i:0;s:4:"Free";i:1;s:7:"Benefit";i:2;s:7:"number3";}s:5:"field";a:3:{i:0;s:4:"ssss";i:1;s:3:"sss";i:2;s:1:"3";}s:9:"hide_show";a:3:{i:0;s:4:"show";i:1;s:4:"hide";i:2;s:4:"show";}}'),
	(9, 3, 1, 'Green Tea', '<p>sdfdf</p>', 'a:3:{s:5:"label";a:1:{i:0;s:17:"Short Description";}s:5:"field";a:1:{i:0;s:7:"Product";}s:9:"hide_show";a:1:{i:0;s:4:"show";}}');
/*!40000 ALTER TABLE `product_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.services
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ser_description` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  `ser_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

# Dumping data for table qnbrandt_tea.services: ~1 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`ser_id`, `ser_title`, `ser_description`, `lang_id`, `ser_status`) VALUES
	(3, 'service 1', '<p>this description edited! ffr</p>', 1, 1);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.services_languages
DROP TABLE IF EXISTS `services_languages`;
CREATE TABLE IF NOT EXISTS `services_languages` (
  `sel_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_id` int(11) NOT NULL,
  `ser_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ser_description` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  `ser_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

# Dumping data for table qnbrandt_tea.services_languages: 1 rows
/*!40000 ALTER TABLE `services_languages` DISABLE KEYS */;
INSERT INTO `services_languages` (`sel_id`, `ser_id`, `ser_title`, `ser_description`, `lang_id`, `ser_status`) VALUES
	(1, 3, 'service 1', '<p>this description edited!</p>', 3, 1);
/*!40000 ALTER TABLE `services_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.slideshow
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `sli_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_image` varchar(300) NOT NULL,
  `sli_description` tinytext,
  `sli_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

# Dumping data for table qnbrandt_tea.slideshow: ~9 rows (approximately)
/*!40000 ALTER TABLE `slideshow` DISABLE KEYS */;
INSERT INTO `slideshow` (`sli_id`, `sli_image`, `sli_description`, `sli_cat_id`) VALUES
	(7, 'IMG_8063-5_950x267.jpg', '<p>add on 10-04-2014 edited</p>', 5),
	(8, 'coupons_950x267.jpg', '<p>add on 10-04-2014</p>', 1),
	(9, 'slide2_black_tea_950x267.jpg', '', 1),
	(10, 'loose_leaf_green_teas_4_950x267.jpg', '', 3),
	(11, 'loose_leaf_herbal_teas_4_950x267.jpg', '', 3),
	(12, 'slide1_green_teas_2014_spring_950x267.jpg', '', 4),
	(13, 'IMG_8063-5_950x267.jpg', '', 4),
	(15, 'long_jing_tea_1_2_950x267.jpg', '', 5),
	(16, '13302329653_950x267.jpg', '', 5);
/*!40000 ALTER TABLE `slideshow` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.slideshow_languages
DROP TABLE IF EXISTS `slideshow_languages`;
CREATE TABLE IF NOT EXISTS `slideshow_languages` (
  `sll_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_id` int(10) DEFAULT NULL,
  `lang_id` int(10) DEFAULT NULL,
  `sli_description` text,
  PRIMARY KEY (`sll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table qnbrandt_tea.slideshow_languages: ~2 rows (approximately)
/*!40000 ALTER TABLE `slideshow_languages` DISABLE KEYS */;
INSERT INTO `slideshow_languages` (`sll_id`, `sli_id`, `lang_id`, `sli_description`) VALUES
	(1, 3, 2, '<p>គេហទំព័រដើម</p>'),
	(2, 1, 3, '<p>ttt</p>');
/*!40000 ALTER TABLE `slideshow_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.sli_categories
DROP TABLE IF EXISTS `sli_categories`;
CREATE TABLE IF NOT EXISTS `sli_categories` (
  `sli_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `sli_cat_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sli_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table qnbrandt_tea.sli_categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `sli_categories` DISABLE KEYS */;
INSERT INTO `sli_categories` (`sli_cat_id`, `sli_cat_name`) VALUES
	(1, 'home'),
	(2, 'About'),
	(3, 'product'),
	(4, 'Service'),
	(5, 'Tea Related'),
	(6, 'Contact');
/*!40000 ALTER TABLE `sli_categories` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.tearelated
DROP TABLE IF EXISTS `tearelated`;
CREATE TABLE IF NOT EXISTS `tearelated` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tea_description` text COLLATE utf8_unicode_ci,
  `lang_id` smallint(6) NOT NULL,
  `tea_status` smallint(11) NOT NULL,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.tearelated: ~3 rows (approximately)
/*!40000 ALTER TABLE `tearelated` DISABLE KEYS */;
INSERT INTO `tearelated` (`tea_id`, `tea_title`, `tea_description`, `lang_id`, `tea_status`) VALUES
	(4, 'How to boil in a good?', '<p>The antioxidants and other properties of green tea appear to protect against cellular damage and cancerous tumour growth. In one study at the University of Texas, green-tea extract was given to patients with precancerous lesions in their mouths, and <strong>it slowed the progression to oral cancer</strong>. Animal studies have also found that tea compounds can inhibit cancer growth.</p>\n<h3><span style="color: #33cccc;">5. Better breath</span></h3>\n<p>Green tea has been associated with better-smelling breath. Why? Likely because it <strong>kills the microbes that make our mouths stinky.</strong> The University of British Columbia&rsquo;s <a href="http://www.dentistry.ubc.ca/" target="_blank">Faculty of Dentistry</a> measured the level of smelly compounds in people&rsquo;s mouths after they were given green-tea powder or another substance that supposedly helps with <a href="http://www.besthealthmag.ca/get-healthy/oral-health/top-10-causes-of-bad-breath">bad breath</a>. <strong>Green tea outperformed mints, chewing gum and even parsley-seed oil in this study.</strong></p>\n<h3><span style="color: #33cccc;">Tips for drinking green tea</span></h3>\n<p>Want your daily diet to include more greens &ndash; green tea, that is? It&rsquo;s likely safe to consume up to five cups a day of the stuff. But to get the maximum health and flavour benefits, make sure you <strong>prep your tea properly</strong>. Prepare a ceramic teapot by warming it with hot water. For the tea, use fresh, cold water, filtered or from a spring, if possible, instead of the tap. After bringing the water to a boil, let it cool for three minutes. Then pour it over tea leaves or a teabag and let it steep, covered, for three more minutes.</p>\n<p>Think your teeth are set because you&rsquo;re already drinking black tea? Keep in mind that since black tea is more processed, it contains less antioxidants and beneficial plant chemical compounds than green tea. Black tea is also two to three times higher in caffeine, so it&rsquo;s more likely to cause side effects such as nervousness and sleep disturbances. Caffeine can also interfere with some medications &ndash; ask your doctor or pharmacist.</p>\n<p>If you&rsquo;re not a tea drinker, <strong>try oral care products that contain green tea</strong>, such as toothpaste and mouthwash (look for these at natural health stores). You can even chew gum or suck on candies made with green tea (as long as they&rsquo;re sugarless!). But if you do enjoy tea, it makes sense to reach for green the next time you&rsquo;re turning on the kettle</p>\n<p>Think your teeth are set because you&rsquo;re already drinking black tea? Keep in mind that since black tea is more processed, it contains less antioxidants and beneficial plant chemical compounds than green tea. Black tea is also two to three times higher in caffeine, so it&rsquo;s more likely to cause side effects such as nervousness and sleep disturbances. Caffeine can also interfere with some medications &ndash; ask your doctor or pharmacist.</p>\n<p>If you&rsquo;re not a tea drinker, <strong>try oral care products that contain green tea</strong>, such as toothpaste and mouthwash (look for these at natural health stores). You can even chew gum or suck on candies made with green tea (as long as they&rsquo;re sugarless!). But if you do enjoy tea, it makes sense to reach for green the next time you&rsquo;re turning on the kettle</p>', 1, 1),
	(5, 'Nutritional breakdown of green tea', '<p style="text-align: justify;">Green tea steeping time and temperature varies with different tea. The hottest steeping temperatures are 81 to 87&nbsp;&deg;C (178 to 189&nbsp;&deg;F) water and the longest steeping times two to three minutes. The coolest brewing temperatures are 61 to 69&nbsp;&deg;C (142 to 156&nbsp;&deg;F) and the shortest times about 30 seconds. In general, lower-quality green teas are steeped hotter and longer, whereas higher-quality teas are steeped cooler and shorter. Steeping green tea too hot or too long will result in a bitter, astringent brew, regardless of the initial quality. It is thought<sup class="noprint Inline-Template" style="white-space: nowrap;">[<em><a title="Wikipedia:Manual of Style/Words to watch" href="http://en.wikipedia.org/wiki/Wikipedia:Manual_of_Style/Words_to_watch#Unsupported_attributions"><span title="The material near this tag may use weasel words or too-vague attribution. (March 2013)">by whom?</span></a></em>]</sup> that excessively hot water results in <a class="mw-redirect" title="Tannins in tea" href="http://en.wikipedia.org/wiki/Tannins_in_tea">tannin</a> chemical release, which is especially problematic in green teas, as they have higher contents of these. High-quality green teas can be and usually are steeped multiple times; two or three steepings is typical. The steeping technique also plays a very important role in avoiding the tea developing an overcooked taste. The container in which the tea is steeped or teapot should also be warmed beforehand so that the tea does not immediately cool down. It is common practice for tea leaf to be left in the cup or pot and for hot water to be added as the tea is drunk until the flavor degrades.</p>\n<p style="text-align: justify;">Green tea steeping time and temperature varies with different tea. The hottest steeping temperatures are 81 to 87&nbsp;&deg;C (178 to 189&nbsp;&deg;F) water and the longest steeping times two to three minutes. The coolest brewing temperatures are 61 to 69&nbsp;&deg;C (142 to 156&nbsp;&deg;F) and the shortest times about 30 seconds. In general, lower-quality green teas are steeped hotter and longer, whereas higher-quality teas are steeped cooler and shorter. Steeping green tea too hot or too long will result in a bitter, astringent brew, regardless of the initial quality. It is thought<sup class="noprint Inline-Template" style="white-space: nowrap;">[<em><a title="Wikipedia:Manual of Style/Words to watch" href="http://en.wikipedia.org/wiki/Wikipedia:Manual_of_Style/Words_to_watch#Unsupported_attributions"><span title="The material near this tag may use weasel words or too-vague attribution. (March 2013)">by whom?</span></a></em>]</sup> that excessively hot water results in <a class="mw-redirect" title="Tannins in tea" href="http://en.wikipedia.org/wiki/Tannins_in_tea">tannin</a> chemical release, which is especially problematic in green teas, as they have higher contents of these. High-quality green teas can be and usually are steeped multiple times; two or three steepings is typical. The steeping technique also plays a very important role in avoiding the tea developing an overcooked taste. The container in which the tea is steeped or teapot should also be warmed beforehand so that the tea does not immediately cool down. It is common practice for tea leaf to be left in the cup or pot and for hot water to be added as the tea is drunk until the flavor degrades.</p>\n<p style="text-align: justify;">Green tea steeping time and temperature varies with different tea. The hottest steeping temperatures are 81 to 87&nbsp;&deg;C (178 to 189&nbsp;&deg;F) water and the longest steeping times two to three minutes. The coolest brewing temperatures are 61 to 69&nbsp;&deg;C (142 to 156&nbsp;&deg;F) and the shortest times about 30 seconds. In general, lower-quality green teas are steeped hotter and longer, whereas higher-quality teas are steeped cooler and shorter. Steeping green tea too hot or too long will result in a bitter, astringent brew, regardless of the initial quality. It is thought<sup class="noprint Inline-Template" style="white-space: nowrap;">[<em><a title="Wikipedia:Manual of Style/Words to watch" href="http://en.wikipedia.org/wiki/Wikipedia:Manual_of_Style/Words_to_watch#Unsupported_attributions"><span title="The material near this tag may use weasel words or too-vague attribution. (March 2013)">by whom?</span></a></em>]</sup> that excessively hot water results in <a class="mw-redirect" title="Tannins in tea" href="http://en.wikipedia.org/wiki/Tannins_in_tea">tannin</a> chemical release, which is especially problematic in green teas, as they have higher contents of these. High-quality green teas can be and usually are steeped multiple times; two or three steepings is typical. The steeping technique also plays a very important role in avoiding the tea developing an overcooked taste. The container in which the tea is steeped or teapot should also be warmed beforehand so that the tea does not immediately cool down. It is common practice for tea leaf to be left in the cup or pot and for hot water to be added as the tea is drunk until the flavor degrades.</p>', 1, 1),
	(6, 'What are the health benefits of green tea?', '<p style="text-align: justify;"><strong>Bladder cancer.</strong> Only a few clinical studies have examined the relationship between bladder cancer and drinking tea. In one study that compared people with and without bladder cancer, researchers found that women who drank black tea and powdered green tea were less likely to develop bladder cancer. A follow-up clinical study by the same group of researchers revealed that people with bladder cancer -- particularly men -- who drank green tea had a better 5-year survival rate than those who did not.</p>\n<p style="text-align: justify;"><strong>Breast cancer.</strong> Clinical studies in animals and test tubes suggest that polyphenols in green tea inhibit the growth of breast cancer cells. In one study of 472 women with various stages of breast cancer, researchers found that women who drank the most green tea had the least spread of cancer. It was especially true in premenopausal women in the early stages of breast cancer. They also found that women with early stages of the disease who drank at least 5 cups of tea every day before being diagnosed with cancer were less likely to have the cancer come back after they finished treatment. However, women with late stages of breast cancer had little or no improvement from drinking green tea.</p>\n<p style="text-align: justify;">There is no clear evidence one way or the other about green tea and breast cancer prevention. In one very large study, researchers found that drinking tea, green or any other type, was not associated with a reduced risk of breast cancer. However, when the researchers broke down the sample by age, they found that women under the age of 50 who consumed 3 or more cups of tea per day were 37% less likely to develop breast cancer compared to women who didn\'t drink tea.</p>\n<p style="text-align: justify;"><strong>Ovarian cancer.</strong> In a clinical study done with ovarian cancer patients in China, researchers found that women who drank at least one cup of green tea per day lived longer with the disease than those who didn&rsquo;t drink green tea. In fact, those who drank the most tea, lived the longest. But other studies found no beneficial effects.</p>\n<p style="text-align: justify;"><strong>Colorectal cancer.</strong> Clinical studies on the effects of green tea on colon or rectal cancer have showed conflicting results. Some studies show decreased risk in those who drink the tea, while others show increased risk. In one study, women who drank 5 or more cups of green tea per day had a lower risk of colorectal cancer compared to non-tea-drinkers. There was no protective effect for men, however. Other studies show that drinking tea regularly may reduce the risk of colorectal cancer in women. More research is needed before researchers can recommend green tea for the prevention of colorectal cancer.</p>\n<p style="text-align: justify;"><strong>Esophageal cancer.</strong> Studies in laboratory animals have found that green tea polyphenols inhibit the growth of esophageal cancer cells. However, studies in people have produced conflicting findings. For example, one large-scale population-based clinical study found that green tea offered protection against the development of esophageal cancer, particularly among women. Another population-based clinical study found just the opposite -- green tea consumption was associated with an increased risk of esophageal cancer. In fact, the stronger and hotter the tea, the greater the risk. Given these conflicting results, more research is needed before scientists can recommend green tea for the prevention of esophageal cancer.</p>\n<div style="overflow: hidden; color: #000000; background-color: #ffffff; text-decoration: none; text-align: justify;"><br />Source: <a style="color: #003399;" href="http://umm.edu/health/medical/altmed/herb/green-tea#ixzz2vwI9JBMP">Green tea | University of Maryland Medical Center</a> <a style="color: #003399;" href="http://umm.edu/health/medical/altmed/herb/green-tea#ixzz2vwI9JBMP">http://umm.edu/health/medical/altmed/herb/green-tea#ixzz2vwI9JBMP</a> <br />University of Maryland Medical Center <br />Follow us: <a href="http://ec.tynt.com/b/rw?id=cAFxnsppar35PradbiUt4I&amp;u=UMMC" target="_blank">@UMMC on Twitter</a> | <a href="http://ec.tynt.com/b/rf?id=cAFxnsppar35PradbiUt4I&amp;u=MedCenter" target="_blank">MedCenter on Facebook</a></div>', 1, 1);
/*!40000 ALTER TABLE `tearelated` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.tearelated_languages
DROP TABLE IF EXISTS `tearelated_languages`;
CREATE TABLE IF NOT EXISTS `tearelated_languages` (
  `teal_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_id` int(11) NOT NULL,
  `tea_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tea_description` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  `tea_status` smallint(6) NOT NULL,
  PRIMARY KEY (`teal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.tearelated_languages: 6 rows
/*!40000 ALTER TABLE `tearelated_languages` DISABLE KEYS */;
INSERT INTO `tearelated_languages` (`teal_id`, `tea_id`, `tea_title`, `tea_description`, `lang_id`, `tea_status`) VALUES
	(9, 4, 'តើ ដាំតែបែបណា​ទើបល្អដើម្បីសុខភាព?', '<p>តែ​បៃតង​ទឹកដោះគោ គឺជា ​ភេសជ្ជៈ​មួយ​មុខ​ ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់ ​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។ ​គួប ​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>គួប ​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>', 2, 1),
	(10, 5, '信阳毛尖 Xin Yang Mao Jian', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>', 3, 1),
	(11, 5, 'ពិធីសាស្រ្ដស្ងោរតែ', '<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>', 2, 1),
	(8, 4, '景宁惠明茶景宁惠明茶景宁', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>', 3, 1),
	(12, 6, 'តើ អ្វីជា អត្ថប្រយោជន៍ ខាងសុខភាពនៃតែ បៃតងមាន អ្វីខ្លះ?', '<p>គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន នៃ​រាជធានី​ភ្នំពេញ​។​</p>\n<p>តែ​បៃតង​ទឹកដោះគោ គឺជា​ភេសជ្ជៈ​មួយ​មុខ​ដែល​ទទួល​ការគាំទ្រ​យ៉ាងច្រើន​ពី​សំណាក់​អតិថិជន និង ជា​ភេសជ្ជៈ​ប្រចាំត្រកូល​របស់​ហាង <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ​។​</p>\n<p>​ គួប​ផ្សំ និង ការតុបតែង​ហាង​យ៉ាង​ល្អ​ប្រណិត មាន​ទីធ្លា​ធំ​ទូលាយ​, មាន​នំ​ប្រមាណ​ជាង ៥០​ប្រភេទ​, ប្រើប្រាស់​អ៊ិន​ធឺ​ណែ​ត ដោយ​ឥតគិតថ្លៃ និង ជាពិសេស​គឺ ភេសជ្ជៈ​តែ​បៃតង​ដែល​មានឱជារស ឈ្ងុយឆ្ងាញ់ ពុំ​អាច​បំភ្លេចបាន ទើបបានជា <strong><span class="medium">ន</span>ស​២​រ</strong> - ហាង​តែ​បៃតង​ទឹកដោះគោ គឺជា​ហាង​ដែល​ឈានមុខ និង មានឈ្មោះ​ល្បី​តែមួយគត់ ព្រមទាំង​មាន​សាខា ៥ កន្លែង សុទ្ធតែ​ស្ថិត​នៅក្នុង​តំបន់​ទីប្រជុំជន <strong><em>នៃ​រាជធានី​ភ្នំពេញ​។​</em></strong></p>\n<p style="text-align: left;"><span id="result_box" lang="km"><span title="Follow us: @UMMC on Twitter | MedCenter on Facebook"><span id="result_box" lang="zh-TW"><span title="University of Maryland Medical Center\n"><span id="result_box" lang="km"><span title="A follow-up clinical study by the same group of researchers revealed that people with bladder cancer -- particularly men -- who drank green tea had a better 5-year survival rate than those who did not.\n\n"><br /></span><span title="Breast cancer.">ជំងឺមហារីកសុដន់។ </span><span title="Clinical studies in animals and test tubes suggest that polyphenols in green tea inhibit the growth of breast cancer cells.">ការសិក្សា នៅក្នុងការ ព្យាបាល សត្វនិង បំពង់ ការធ្វើតេស្ត បានបង្ហាញថា polyphenols នៅក្នុងតែ បៃតង រារាំងការរីកចម្រើនរបស់ កោសិកាមហារីក សុដន់ ។ </span><span title="In one study of 472 women with various stages of breast cancer, researchers found that women who drank the most green tea had the least spread of cancer.">នៅក្នុងការសិក្សា មួយ របស់ស្ត្រី 472 ជាមួយនឹង ដំណាក់កាល ផ្សេងគ្នានៃ ជំងឺមហារីកសុដន់ , អ្នកស្រាវជ្រាវបាន រកឃើញថា ស្ត្រីដែល ផឹក តែបៃតង ច្រើនបំផុត ដែល មាន ការរីករាលដាល យ៉ាងហោចណាស់ នៃជំងឺមហារីក។ </span><span title="It was especially true in premenopausal women in the early stages of breast cancer.">វាគឺជាការ ពិត ជាពិសេសនៅក្នុង ស្ត្រី premenopausal នៅក្នុងដំណាក់កាល ដំបូងនៃ ជំងឺមហារីក សុដន់។ </span><span title="They also found that women with early stages of the disease who drank at least 5 cups of tea every day before being diagnosed with cancer were less likely to have the cancer come back after they finished treatment.">ពួកគេក៏ បានរកឃើញថា ស្ត្រីដែលមាន ដំណាក់កាលដំបូងនៃ ជំងឺ ដែលផឹកកាហ្វេ យ៉ាងហោចណាស់ 5 ពែង តែ ជារៀងរាល់ថ្ងៃ មុនពេលត្រូវបាន ធ្វើរោគវិនិច្ឆ័យថាមាន ជំងឺមហារីក នោះគឺ មិនសូវ មាន ជំងឺមហារីក ត្រឡប់មកវិញ បន្ទាប់ពីពួកគេ បានបញ្ចប់ ការព្យាបាល។ </span><span title="However, women with late stages of breast cancer had little or no improvement from drinking green tea.\n\n">ទោះជាយ៉ាងណា ស្ត្រីដែលមាន ដំណាក់កាល ចុង នៃជំងឺមហារីក សុដន់ មាន ភាពប្រសើរឡើង តិចតួច ឬគ្មាន ការផឹក តែ ពណ៌បៃតង។<br /></span><span title="There is no clear evidence one way or the other about green tea and breast cancer prevention.">មាន វិធី ច្បាស់លាស់ គ្មាន ភស្តុតាង មួយឬ ផ្សេងទៀត អំពីការ តែបៃតង និងការការពារ ជំងឺមហារីកសុដន់ បាន។ </span><span title="In one very large study, researchers found that drinking tea, green or any other type, was not associated with a reduced risk of breast cancer.">នៅក្នុងការសិក្សា ដ៏ធំ មួយក្នុងចំណោម ក្រុមអ្នកស្រាវជ្រាវ បានរកឃើញថា ការផឹក តែ បៃតង ឬ ផ្សេងទៀតណាមួយ ប្រភេទ ត្រូវបានគេ មិនបាន ផ្សារភ្ជាប់ទៅនឹងការ ថយចុះហានិភ័យនៃ ជំងឺមហារីកសុដន់។ </span><span title="However, when the researchers broke down the sample by age, they found that women under the age of 50 who consumed 3 or more cups of tea per day were 37% less likely to develop breast cancer compared to women who didn\'t drink tea.\n\n">ទោះជាយ៉ាងណា នៅពេលដែល ក្រុមអ្នកស្រាវជ្រាវ បានផ្ទុះ ធ្លាក់ចុះ គំរូ តាមអាយុ នោះពួកគេ បានរកឃើញ ថាស្ត្រី អាយុ 50 ដែលបាន ប្រើប្រាស់ 3 ឬច្រើន ពែង ក្នុងមួយថ្ងៃ តែ ស្ថិតនៅក្រោម គឺមាន 37% ដែលមិនសូវវិវត្តជា ជំងឺមហារីក សុដន់ បើធៀបទៅនឹង ស្ត្រីដែល មិនបាន ផឹក តែ។<br /><br /></span><span title="Ovarian cancer.">ជំងឺមហារីក ក្រពេញអូវែ ។ </span><span title="In a clinical study done with ovarian cancer patients in China, researchers found that women who drank at least one cup of green tea per day lived longer with the disease than those who didn\'t drink green tea.">នៅក្នុងការសិក្សា មួយដែល បានធ្វើ ជាមួយនឹងការ ព្យាបាល អ្នកជំងឺមហារីក ក្រពេញអូវែ នៅក្នុងប្រទេសចិន , អ្នកស្រាវជ្រាវ បានរកឃើញថា ស្ត្រីដែល ផឹក យ៉ាងហោចណាស់មួយ ពែងនៃ តែបៃតង ក្នុងមួយថ្ងៃ រស់នៅ បានយូរជាង ដែលមានជំងឺ នេះ ជាង អ្នកដែលមិន ផឹកតែ ពណ៌បៃតង។ </span><span title="In fact, those who drank the most tea, lived the longest.">ជាការពិត អ្នកដែលបាន ផឹក តែ ដែល ភាគច្រើន រស់នៅ វែងបំផុត នេះ។ </span><span title="But other studies found no beneficial effects.\n\n">ប៉ុន្តែ ការសិក្សា ផ្សេងទៀត បានរកឃើញ គ្មាន ផលប៉ះពាល់ ប្រយោជន៍។<br /></span><span title="Colorectal cancer.">មហារីកពោះវៀនធំ។ </span><span title="Clinical studies on the effects of green tea on colon or rectal cancer have showed conflicting results.">ការសិក្សា គ្លីនិចនៅ ផលប៉ះពាល់ នៃ តែបៃតង នៅលើ ពោះវៀន ឬ ជំងឺមហារីក គូថ បាន បង្ហាញថា លទ្ធផល ដែលប៉ះទង្គិច ។ </span><span title="Some studies show decreased risk in those who drink the tea, while others show increased risk.">ការសិក្សា មួយចំនួន បានបង្ហាញពី ការថយចុះ ហានិភ័យ ក្នុងការ អ្នកដែលបាន ផឹកតែ ខណៈពេលដែល អ្នកផ្សេងទៀត បានបង្ហាញថា ការកើនឡើងហានិភ័យ ។ </span><span title="In one study, women who drank 5 or more cups of green tea per day had a lower risk of colorectal cancer compared to non-tea-drinkers.">នៅក្នុងការសិក្សា មួយ ស្ត្រីដែល ផឹក 5 ឬច្រើន ពែង តែបៃតង ក្នុងមួយថ្ងៃ មានការ ថយចុះហានិភ័យ នៃជំងឺមហារីក ពោះវៀនធំ បើប្រៀបធៀប ទៅនឹងការមិន តែ អ្នកផឹក ។ </span><span title="There was no protective effect for men, however.">មិនមាន ប្រសិទ្ធិភាព ការពារ មួយសម្រាប់ បុរស គឺ ទោះជាយ៉ាងណា ។ </span><span title="Other studies show that drinking tea regularly may reduce the risk of colorectal cancer in women.">ការសិក្សា ផ្សេងទៀតបង្ហាញ ថាការផឹក តែ ជាទៀងទាត់ អាចកាត់បន្ថយ ហានិភ័យនៃជំងឺមហារីក ពោះវៀនធំនិងរន្ធគូថ នៅ ស្ត្រី។ </span><span title="More research is needed before researchers can recommend green tea for the prevention of colorectal cancer.\n\n">ការស្រាវជ្រាវ បន្ថែមគឺចាំបាច់ មុនពេលដែល ក្រុមអ្នកស្រាវជ្រាវ អាចផ្តល់អនុសាសន៍ តែបៃតង សម្រាប់ការការពារ នៃជំងឺមហារីក ពោះវៀនធំ នោះទេ។<br /></span><span title="Esophageal cancer.">ជំងឺមហារីក បំពង់អាហារ ។ </span><span title="Studies in laboratory animals have found that green tea polyphenols inhibit the growth of esophageal cancer cells.">ការសិក្សា នៅក្នុង សត្វ មន្ទីរពិសោធន៍ បានរកឃើញ ថាការ polyphenols តែបៃតង រារាំងការរីកចម្រើនរបស់ កោសិកាមហារីក បំពង់អាហារ នោះទេ។ </span><span title="However, studies in people have produced conflicting findings.">ទោះជាយ៉ាងណា ការសិក្សា នៅក្នុងការ នាក់បាន រកឃើញ ផលិត ប៉ះទង្គិច ។ </span><span title="For example, one large-scale population-based clinical study found that green tea offered protection against the development of esophageal cancer, particularly among women.">ឧទាហរណ៍ ការសិក្សា ចំនួនប្រជាជន ដែលមានមូលដ្ឋាន ក្នុងទ្រង់ទ្រាយធំ មួយ វេជ្ជសាស្ត្រ បានរកឃើញថា តែបៃតង បានផ្តល់ ការការពារប្រឆាំងនឹង ការអភិវឌ្ឍនៃ ជំងឺមហារីក បំពង់អាហារ ជាពិសេស ក្នុងចំណោម ស្ត្រី។ </span><span title="Another population-based clinical study found just the opposite -- green tea consumption was associated with an increased risk of esophageal cancer.">ការសិក្សា គ្លីនិក ចំនួនប្រជាជន ដែលមានមូលដ្ឋាន ផ្សេងទៀត បានរកឃើញថា គ្រាន់តែ ផ្ទុយពីនេះ - ការប្រើប្រាស់ តែបៃតង ត្រូវបានផ្សារភ្ជាប់ ជាមួយនឹងការកើនឡើង ហានិភ័យនៃជំងឺមហារីក បំពង់អាហារ ។ </span><span title="In fact, the stronger and hotter the tea, the greater the risk.">នៅក្នុងការពិត នេះ តែ ហានិភ័យ ដ៏ខ្លាំងនិង hotter នេះ កាន់តែច្រើន។ </span><span title="Given these conflicting results, more research is needed before scientists can recommend green tea for the prevention of esophageal cancer.\n\n">លទ្ធផលទាំងនេះ បានផ្តល់ឱ្យ ប៉ះទង្គិច ការស្រាវជ្រាវ បន្ថែមគឺចាំបាច់ មុនពេល អ្នកវិទ្យាសាស្រ្ត អាច ផ្ដល់អនុសាសន៍ តែបៃតង សម្រាប់ការការពារ នៃជំងឺមហារីក បំពង់អាហារ បាន។</span></span></span></span></span></span></p>', 2, 1),
	(13, 6, '什麼是綠茶對健康的好處？', '<p><strong>景宁惠明茶</strong><strong>​ 景宁惠明茶 </strong><strong>景宁惠明茶<strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong><strong>景宁惠明茶</strong></strong></p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p style="text-align: justify;">牛奶绿茶是NOR SAR PY ROR的特色饮料，同时也最受到我们顾客的喜爱。</p>\n<p style="text-align: justify;">配有精致的装饰、宽敞的环境、免费使用无线网络、超过50多种的烘焙食品，特别是清爽的牛奶绿茶把NOR SAR PY ROR牛奶绿茶店推到顶部；目前我们在金边有5个分店。</p>\n<p><span id="result_box" lang="zh-TW"><span title="Given these conflicting results, more research is needed before scientists can recommend green tea for the prevention of esophageal cancer.\n\n">&nbsp;</span></span></p>', 3, 1);
/*!40000 ALTER TABLE `tearelated_languages` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.usergroup
DROP TABLE IF EXISTS `usergroup`;
CREATE TABLE IF NOT EXISTS `usergroup` (
  `usg_id` int(11) NOT NULL AUTO_INCREMENT,
  `usg_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usg_description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`usg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.usergroup: ~2 rows (approximately)
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` (`usg_id`, `usg_name`, `usg_description`) VALUES
	(1, 'root', 'the supper administrator. this user can be no'),
	(2, 'admin', 'this user can be deleted. the role is after  ');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;


# Dumping structure for table qnbrandt_tea.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_date_create` datetime DEFAULT NULL,
  `usg_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table qnbrandt_tea.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`use_id`, `use_name`, `use_password`, `use_date_create`, `usg_id`) VALUES
	(1, 'root', '838a0d72e5c565a35fb17bbf22c349538ff0bb11', '2013-12-18 11:54:43', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
