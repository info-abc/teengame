<?php
//menu category_parent
define('MENU', 1);
//content category_parent
define('CONTENT', 2);
//Relation parent
define('MENU_RELATION', '1');
define('CONTENT_RELATION', '2');
define('TYPE_RELATION', '3');

define('CATEGORYPARENT', 'CategoryParent');
define('TYPE', 'Type');
define('CONTENTREATION', 'Content');
define('MENURELATION', 'Menu');
//End Relation
define('CONTENT_SEGMENT', 'content');
//permission role
define('ADMIN', 1);
define('EDITOR', 2);
define('SEO', 3);
//game of parent category only
define('GAME_OF_PARENT', 0);
//pagination manager admin
define('PAGINATE', 20);
//pagination frontend
define('FRONENDPAGINATE', 15);
//url upload img
define('UPLOADIMG', '/images');
//url upload avatar game
define('UPLOAD_GAME_AVATAR', '/images/game_avatar');
//url upload games
define('UPLOAD_GAMEZIP', '/games-zip');
//define('UPLOAD_GAME', '/gametest');
define('UPLOAD_GAME', '/games');
define('UPLOAD_FLASH', '/games-flash');
define('UPLOAD_GAMEOFFLINE', '/games-offline');
//url upload news
define('UPLOAD_NEWS', '/news');
define('UPLOAD_GAME_TYPE', '/gametype');
//folder upload image facebook
define('FOLDER_SEO_GAME', 'fb_game');
define('FOLDER_SEO_GAMETYPE', 'fb_gametype');
define('FOLDER_SEO_PARENT', 'fb_parent');
define('FOLDER_SEO_NEWS', 'fb_news');
define('FOLDER_SEO_NEWS_TYPE', 'fb_news_type');
define('FOLDER_SEO_TAG', 'fb_tag');
define('FOLDER_SEO', 'seo');

//device
define('MOBILE', 1);
define('COMPUTER', 2);
//if upload file
define('IS_UPLOAD_FILE', 1);
define('IS_UPLOAD_UNIQUE', 1);
//status admin
define('INACTIVE', 0);
define('ACTIVE', 1);
//status game:
define('DISABLED', 0);
define('ENABLED', 1);
//saveScore
define('SAVESCORE', 1);
define('UNSAVESCORE', 2);
//category game
define('GAMEFLASH', 1);
define('GAMEHTML5', 2);
define('GAMEOFFLINE', 3);
define('GAMEONLINE', 4);
//history action
define('CREATE', 'Create');
define('EDIT', 'Edit');
define('REMOVE', 'Remove');
define('LOGIN', 'Login');
//define device
define('SMART_DEVICE', 'Smart device');
define('COMPUTER_DEVICE', 'Computer');
//define advertise position
define('HEADER', 1);
define('Footer', 2);
define('CHILD_PAGE', 3);
define('CHILD_PAGE_RELATION', 4);
//advertise url image
define('UPLOAD_ADVERTISE', '/images/advertise');
define('BOTTOM', 'bottom');
//arrange parent
define('HOT', 1);
define('GAME_PLAY', 2);
define('GAME_VOTE', 3);
define('GAME_VIEW', 4);
define('GAME_DOWNLOAD', 5);
define('GAME_NEWEST', 6);
//type policy
define('POLICY', 1);
define('ABOUT_POLICY', 2);
//define paging frontend
define('PAGINATE_BOXGAME', 12);
define('PAGINATE_LISTGAME', 12);
//status user
define('ACTIVEUSER', 'Kích hoạt');
define('INACTIVEUSER', 'Chưa kích hoạt');
define('TYPESYSTEM', 'Hệ thống');
define('TYPEFACEBOOK', 'Facebook');
define('TYPEGOOGLE', 'Google');
//define slide type name
define('SLIDE_TYPE_NAME', 'Kiểu slide chạy ngang');
//define limited box game related
define('GAME_RELATED_MOBILE', 6);
define('GAME_RELATED_WEB', 12);
define('UPLOAD_IMAGE_SLIDE', '/slide');
define('PAGINATE_SLIDE', 10);
//define seo model name:
define('SEO_SCRIPT', 'Seo_Script');
define('SEO_META', 'Seo_Meta');
//define check time count download
define('TIMELIMITED', 60);
//define size cut off text descript
define('SIZETEXT', '200');
//facebook
define('APP_ID', '1008308405878197');
define('APP_SECRET', 'a758055e09aef79f81eb7dd4f4588be7');
define('APP_ADMIN', '1088553914497350');
//define limit scores
define('GAMESCORE_LIMITED', 5);
//defune page comment fron-end
define('PAGE_COMMENT', 5);
//define google app
define('GOOGLE_REDIRECT_URL', 'http://choinhanh.vn/login_google');
define('GOOGLE_CLIENT_SECRET', 'o4tqEc2h98D0-5YtowSf8rTX');
define('GOOGLE_CLIENT_ID', '800160880332-i03v26072o1ul4ej7q0p6f6tonvu098a.apps.googleusercontent.com');
define('TEXTLENGH', 25);
//define total game if count = 0
define('NO_GAME', 0);
//define message comment
define('COMMENT_MESSAGE', 'Comment success');
define('COMMENT_NO_MESSAGE', 'Message is required');
define('TEXTLENGH_DESCRIPTION', 154);
define('PAGINATE_RELATED', 6);
define('PAGINATE_MOBILE', 12);
//image avatar
define('UPLOAD_USER_AVATAR', '/user_avatar');
//error type
define('ERROR_TYPE_404', 1);
define('ERROR_TYPE_MISSING', 2);
//define cache time
define('CACHETIME', 5);
//define game top
define('GAMETOP', 30);
define('GAMETOP_LIMITED', 6);
//define game scale
define('GAME_VERTICAL', 1);
define('GAME_HORIZONTAL', 2);

define('CHOINHANH', 'choinhanh.vn');
define('CHOINHANH_LOGO_ALT', 'choinhanh.vn');
define('CHOINHANH_INDEX_H1', 'game24h | game mobile');

//category parent id for fix url
// game moi nhat
define('GAME_NEW', 7);
// game android
define('GAME_ANDROID', 1);
// game hay nhat (choi nhieu)
define('GAME_PLAY_MANY', 4);

//define mobile
define('IS_MOBILE', 1);
define('IS_NOT_MOBILE', 0);
//define home
define('IS_HOME', 1);
define('IS_NOT_HOME', 0);

//define position ad - PC
// define('POSITION_HEADER', 1);
// define('POSITION_FOOTER', 2);
//Trang chủ
// define('POSITION_HOMEBOX', 3);
//Trang danh mục: Giữa box hay nhất và mới nhất
define('POSITION_TYPE', 4);
//Trang bình chọn nhiều: Giữa bình chọn nhiều và hay nhất
define('POSITION_VOTEMANY', 5);
//Trang hay nhất: Giữa hay nhất và bình chọn nhiều
define('POSITION_PLAYMANY', 6);
//Trang game android: Giữa tải nhiều và mới nhất
define('POSITION_GAMEANDROID', 7);
//Trang chi tiết chơi game
//Preroll 
define('POSITION_GAMEDETAIL', 8);
//Trên box game hay nhất ( 300x600 )
define('POSITION_GAMEDETAIL_GAMETOP', 9);

//define position ad - Mobile
//Trên nút chơi ngay thứ 2
define('POSITION_MOBILE_PLAYBUTTON2', 10);
//
// define('POSITION_MOBILE_HEADER', 11);
// define('POSITION_MOBILE_FOOTER', 12);
// define('POSITION_MOBILE_HOMEBOX', 13);
define('POSITION_MOBILE_TYPE', 14);
define('POSITION_MOBILE_VOTEMANY', 15);
define('POSITION_MOBILE_PLAYMANY', 16);
define('POSITION_MOBILE_GAMEANDROID', 17);

//news
define('POSITION_NEWS_SAPO', 18);
define('POSITION_MOBILE_NEWS_SAPO', 19);
define('POSITION_NEWS_RIGHT', 20);
define('POSITION_NEWS_LIST_RIGHT', 21);

//categoryparent status
//ko hien thi index + khong hien thi trong sitemap
define('CATEGORYPARENT_STATUS_0', 0);
define('CATEGORYPARENT_STATUS_TEXT_0', 'Không hiển thị');
//hien thi index + hien thi trong sitemap
define('CATEGORYPARENT_STATUS_1', 1);
define('CATEGORYPARENT_STATUS_TEXT_1', 'Hiển thị');
//khong hien thi index + hien thi trong sitemap
define('CATEGORYPARENT_STATUS_2', 2);
define('CATEGORYPARENT_STATUS_TEXT_2', 'Không hiển thị - hiện sitemap');

define('MENU_GAME_ANDROID', 1);
define('MENU_GAME_ONLINE', 18);

define('FOLDER_HTML_CODE', '/htmlpage');
