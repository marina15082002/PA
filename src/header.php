<?php
    include __DIR__ . "\head.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

?>

<header id="header">
    <style>
        header{
            color: black;
        }

        header a{
            color: black;
        }

        header a:hover{
            color: #02731e;
        }

		body {
			margin: unset;
		}

		#header {
			display: flex;
			flex-direction: row;
			height: 4rem;
			background-color: #6eb784!important;
		}

		#sitename>svg {
			height: 2.5rem;
			width: 2.5rem;
			margin: .3rem 0.4rem 1.2rem 0;
		}

		#header>#sitename {
			display: flex;
			flex-direction: row;
			font-size: 2rem;
			margin-right: 4rem;
		}

		#header>* {
			margin: 0 1.5rem;
			height: 4rem;
			line-height: 4rem;
		}

		#header-right-part {
			line-height: unset;
			flex-grow: 1;
			display: flex;
			flex-direction: row;
			justify-content: right;
			align-items: center;
			margin: 0;
		}

		#header-flag, #header-account {
			width: 4rem;
			margin: 0 1rem;
			height: 2rem;
			cursor: pointer;
			background-repeat: no-repeat;
			background-position: 80% 55%;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
		}

		#header-right-part>div>svg {
			width: 2rem;
			height: 2rem;
			margin-right: 1.5rem;
		}

		.header-popup-anchor {
			position: relative;
		}

		.header-popup-anchor>div {
			position: absolute;
			right: 1rem;
			top: 1.5rem;
			background-color: #67c487;
			transition: height .4s ease-out;
			overflow: hidden;
		}

		.header-popup-anchor>div>* {
			padding: 0 .5rem;
			height: 3rem;
			display: flex;
			align-items: center;
			justify-content: space-between;
			cursor: pointer;
		}

		.header-popup-anchor>div>*:hover {
			background-color: #9dfcbe;
		}

		.header-popup-anchor>div>*>svg {
			width: 1.5rem;
			height: 1.5rem;
			margin-left: .5rem;
		}

		#header-flag-popup svg {
			width: 2rem;
			height: 2rem;
            z-index:5;
		}

		@media all and (max-width: 1200px) {
			#header > * {
				margin: 0 .75rem;
			}

			#header > #sitename {
				margin-right: 1.5rem;
				font-size: 1.5rem;
			}

			#header-flag, #header-account {
				margin: 0 .5rem;
			}

			#header-right-part {
				margin-right: unset;
			}
		}

		@media all and (max-width: 850px) {
			#header > a:nth-child(2) {
				display: none;
			}
		}

		@media all and (max-width: 750px) {
			#header > a:nth-child(4) {
				display: none;
			}
		}

		@media all and (max-width: 650px) {
			#header > a:nth-child(5) {
				display: none;
			}
		}

		@media all and (max-width: 550px) {
			#header > a:nth-child(3) {
				display: none;
			}
		}
	</style>
    <div id="sitename">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3-fill" viewBox="0 0 16 16">
            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
        </svg>
        No&nbsp;More&nbsp;Waste
    </div>
    <a href="/PA/<?php echo $language ?>/"><?php echo $lang['TITLE_INDEX']; ?></a>
    <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
            echo "
                <a href='/PA/<?php echo $language ?>/addProduct'>" . $lang['LINK_GIVE'] . "</a>
                <a>" . $lang['TITLE_HISTORICAl'] . "</a>
                ";
        }

        if (!isset($_SESSION['email'])) {
            echo "
                <a  href='/PA/" . $language . "/login'>" . $lang['TITLE_LOGIN'] . "</a>
                <a  href='/PA/". $language . "/signup'>" . $lang['TITLE_SIGNUP'] . "</a>
                ";
        }

        if (isset($_SESSION['poste']) && $_SESSION['poste'] == "Admin") {
            echo "
                <a href='/PA/". $language . "/calendarAdmin'>" . $lang['TITLE_COLLECT'] . "</a>
                <a href='/PA/". $language . "/calendarDistrib'>" . $lang['TITLE_DISTRIB'] . "</a>
                <a href='/PA/". $language . "/modifyAdmin'>" . $lang['TITLE_EMPLOYEES'] . "</a>
                <a href='/PA/". $language . "/modifyUsers'>" . $lang['TITLE_USERS'] . "</a>
                <a href='/PA/". $language . "/stock'>" . $lang['TITLE_STOCK'] . "</a>
                <a href='/PA/" . $language . "/signout'>" . $lang['SIGNOUT'] . "</a>
                ";
        }
    ?>
    <a><?php echo $lang["TITLE_HELP"]; ?></a>
    <div id="header-right-part">
        <div id="header-flag"></div>
        <div class="header-popup-anchor">
            <div id="header-flag-popup" style="right: 999999px; height: 0px; z-index:5;">
                <div id="header-flag-french">Français<svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-fr" viewBox="0 0 640 480"><g fill-rule="evenodd" stroke-width="1pt"><path fill="#fff" d="M0 0h640v480H0z"/><path fill="#002654" d="M0 0h213.3v480H0z"/><path fill="#ce1126" d="M426.7 0H640v480H426.7z"/></g></svg></div>
                <div id="header-flag-english">English<svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480"><path fill="#012169" d="M0 0h640v480H0z"/><path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/><path fill="#C8102E" d="m424 281 216 159v40L369 281h55zm-184 20 6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z"/><path fill="#FFF" d="M241 0v480h160V0H241zM0 160v160h640V160H0z"/><path fill="#C8102E" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z"/></svg></div>
                <div id="header-flag-italian">Italiano<svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-it" viewBox="0 0 640 480"><g fill-rule="evenodd" stroke-width="1pt"><path fill="#fff" d="M0 0h640v480H0z"/><path fill="#009246" d="M0 0h213.3v480H0z"/><path fill="#ce2b37" d="M426.7 0H640v480H426.7z"/></g></svg></div>
                <div id="header-flag-portuguese">Português<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="flag-icons-pt" viewBox="0 0 640 480"><path fill="red" d="M256 0h384v480H256z"/><path fill="#060" d="M0 0h256v480H0z"/><g fill="#ff0" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width=".6"><path d="M339.5 306.2c-32.3-1-180-93.2-181-108l8.1-13.5c14.7 21.3 165.7 111 180.6 107.8l-7.7 13.7"/><path d="M164.9 182.8c-2.9 7.8 38.6 33.4 88.4 63.8 49.9 30.3 92.9 49 96 46.4l1.5-2.8c-.6 1-2 1.3-4.3.6-13.5-3.9-48.6-20-92.1-46.4-43.6-26.4-81.4-50.7-87.3-61a6.3 6.3 0 0 1-.6-3.1h-.2l-1.2 2.2-.2.3zm175.3 123.8c-.5 1-1.6 1-3.5.8-12-1.3-48.6-19.1-91.9-45-50.4-30.2-92-57.6-87.4-64.8l1.2-2.2.2.1c-4 12.2 82.1 61.4 87.2 64.6 49.8 30.8 91.8 48.9 95.5 44.2l-1.3 2.3z"/><path d="M256.2 207.2c32.2-.3 72-4.4 95-13.6l-5-8c-13.5 7.5-53.5 12.5-90.3 13.2-43.4-.4-74.1-4.5-89.5-14.8l-4.6 8.6c28.2 12 57.2 14.5 94.4 14.6"/><path d="M352.5 193.8c-.8 1.3-15.8 6.4-37.8 10.2a381.2 381.2 0 0 1-58.6 4.3 416.1 416.1 0 0 1-56.2-3.6c-23.1-3.6-35-8.6-39.5-10.4l1.1-2.2c12.7 5 24.7 8 38.7 10.2A411.5 411.5 0 0 0 256 206a391.8 391.8 0 0 0 58.3-4.3c22.5-3.7 34.8-8.4 36.6-10.5l1.6 2.7zm-4.4-8.1c-2.4 2-14.6 6.3-36 9.7a388.2 388.2 0 0 1-55.8 4c-22 0-40.1-1.6-53.8-3.6-21.8-2.8-33.4-8-37.6-9.4l1.3-2.2c3.3 1.7 14.4 6.2 36.5 9.3a385 385 0 0 0 53.6 3.4 384 384 0 0 0 55.4-4c21.5-3 33.1-8.4 34.9-9.8l1.5 2.6zM150.3 246c19.8 10.7 63.9 16 105.6 16.4 38 .1 87.4-5.8 105.9-15.6l-.5-10.7c-5.8 9-58.8 17.7-105.8 17.4-47-.4-90.7-7.6-105.3-17v9.5"/><path d="M362.8 244.5v2.5c-2.8 3.4-20.2 8.4-42 12a434 434 0 0 1-65.4 4.4 400 400 0 0 1-62-4.3 155 155 0 0 1-44.4-12v-2.9c9.7 6.4 35.9 11.2 44.7 12.6 15.8 2.4 36.1 4.2 61.7 4.2 26.9 0 48.4-1.9 65-4.4 15.7-2.3 38-8.2 42.4-12.1zm0-9v2.5c-2.8 3.3-20.2 8.3-42 11.9a434 434 0 0 1-65.4 4.5 414 414 0 0 1-62-4.3 155 155 0 0 1-44.4-12v-3c9.7 6.5 36 11.2 44.7 12.6a408 408 0 0 0 61.7 4.3c26.9 0 48.5-2 65-4.5 15.7-2.2 38-8.1 42.4-12zm-107 68.8c-45.6-.2-84.7-12.4-93-14.4l6 9.4a249.8 249.8 0 0 0 87.4 14.3c34.7-1 65-3.7 86.3-14.1l6.2-9.8c-14.5 6.9-64 14.6-93 14.6"/><path d="M344.9 297.3a143 143 0 0 1-2.8 4c-10 3.6-26 7.4-32.6 8.4a295.5 295.5 0 0 1-53.7 5c-40.4-.6-73.5-8.5-89-15.3l-1.3-2.1.2-.4 2.1.9a286.5 286.5 0 0 0 88.2 14.5c18.8 0 37.5-2.1 52.6-4.8 23.2-4.7 32.6-8.2 35.5-9.8l.7-.4zm5.3-8.8a287.2 287.2 0 0 1-2 3.5c-5.4 2-20 6.2-41.3 9.2-14 1.9-22.7 3.8-50.6 4.3a347.4 347.4 0 0 1-94.2-14L161 289a390 390 0 0 0 95.4 14c25.5-.5 36.4-2.4 50.3-4.3 24.8-3.8 37.3-8 41-9.1a2.9 2.9 0 0 0 0-.2l2.6-1z"/><path d="M350.8 237.6c.1 30-15.3 57-27.6 68.8a99.3 99.3 0 0 1-67.8 28.2c-30.3.5-58.8-19.2-66.5-27.9a101 101 0 0 1-27.5-67.4c1.8-32.8 14.7-55.6 33.3-71.3a99.6 99.6 0 0 1 64.2-22.7 98.2 98.2 0 0 1 71 35.6c12.5 15.2 18 31.7 20.9 56.7zM255.6 135a106 106 0 0 1 106 105.2 105.6 105.6 0 1 1-211.4 0c-.1-58 47.3-105.2 105.4-105.2"/><path d="M255.9 134.5c58.2 0 105.6 47.4 105.6 105.6S314.1 345.7 256 345.7s-105.6-47.4-105.6-105.6c0-58.2 47.4-105.6 105.6-105.6zM152.6 240c0 56.8 46.7 103.3 103.3 103.3 56.6 0 103.3-46.5 103.3-103.3s-46.7-103.3-103.3-103.3S152.6 183.2 152.6 240z"/><path d="M256 143.3a97 97 0 0 1 96.7 96.7 97.1 97.1 0 0 1-96.7 96.8c-53 0-96.7-43.6-96.7-96.8a97.1 97.1 0 0 1 96.7-96.7zM161.6 240c0 52 42.6 94.4 94.4 94.4s94.4-42.5 94.4-94.4c0-52-42.6-94.4-94.4-94.4a94.8 94.8 0 0 0-94.4 94.4z"/><path d="M260.3 134h-9.1v212.3h9z"/><path d="M259.3 132.8h2.3v214.7h-2.2V132.8zm-9 0h2.4v214.7h-2.3V132.8z"/><path d="M361.6 244.2v-7.8l-6.4-6-36.3-9.6-52.2-5.3-63 3.2-44.8 10.6-9 6.7v7.9l22.9-10.3 54.4-8.5h52.3l38.4 4.2 26.6 6.4z"/><path d="M256 223.8c24.9 0 49 2.3 68.3 6 19.8 4 33.7 9 38.5 14.5v2.8c-5.8-7-24.5-12-39-15-19-3.6-43-6-67.9-6-26.1 0-50.5 2.6-69.3 6.2-15 3-35.1 9-37.6 14.8v-2.9c1.3-4 16.3-10 37.3-14.3 18.9-3.7 43.3-6.1 69.6-6.1zm0-9.1a383 383 0 0 1 68.3 6c19.8 4 33.7 9 38.5 14.6v2.7c-5.8-6.9-24.5-12-39-14.9-19-3.7-43-6-67.9-6a376 376 0 0 0-69.2 6.2c-14.5 2.7-35.4 8.9-37.7 14.7v-2.8c1.4-4 16.6-10.3 37.3-14.3 19-3.7 43.3-6.2 69.7-6.2zm-.6-46.2c39.3-.2 73.6 5.5 89.3 13.5l5.7 10c-13.6-7.4-50.6-15-94.9-14-36.1.3-74.7 4-94 14.4l6.8-11.4c15.9-8.3 53.3-12.5 87.1-12.5"/><path d="M256 176.7a354 354 0 0 1 61.3 4.3c16 3 31.3 7.4 33.5 9.8l1.7 3c-5.3-3.4-18.6-7.3-35.6-10.5s-38.7-4.3-61-4.2c-25.3-.1-45 1.2-61.8 4.2a108.9 108.9 0 0 0-33.3 10.3l1.7-3.1c6-3 15.3-6.7 31.1-9.6 17.5-3.2 37.4-4.1 62.4-4.2zm0-9c21.4-.2 42.6 1 59.1 4a96 96 0 0 1 30.6 10l2.5 4c-4.2-4.7-20-9.2-34.1-11.6-16.4-2.9-36.7-4-58.1-4.2a361 361 0 0 0-59.5 4.4 97.3 97.3 0 0 0-29.6 9.1l2.2-3.3c5.8-3 15.2-5.8 27-8.1a357 357 0 0 1 59.9-4.4zM308.4 284a276.4 276.4 0 0 0-52.5-4c-65.5.8-86.6 13.5-89.2 17.3l-5-8c16.8-12 52.4-18.8 94.6-18.2 21.9.4 40.8 1.9 56.6 5l-4.5 8"/><path d="M255.6 278.9c18.2.3 36 1 53.3 4.2l-1.2 2.2c-16-3-33.2-4-52-4-24.3-.2-48.7 2.1-70 8.2-6.7 1.9-17.8 6.2-19 9.8l-1.2-2c.4-2.2 7-6.6 19.6-10 24.4-7 47.2-8.3 70.5-8.4zm.8-9.2a327 327 0 0 1 57.3 5l-1.3 2.3a299 299 0 0 0-56-4.9c-24.2 0-49.9 1.8-73.3 8.6-7.5 2.2-20.6 7-21 10.7l-1.2-2.2c.2-3.4 11.5-7.9 21.7-10.8 23.5-6.9 49.3-8.6 73.8-8.7z"/><path d="m349.4 290.5-7.8 12.3-22.7-20.1-58.6-39.5-66.2-36.3-34.3-11.7 7.3-13.6 2.5-1.3 21.3 5.3 70.4 36.3 40.6 25.6L336 272l13.9 16z"/><path d="M158.6 195.5c6-4 50.2 15.6 96.6 43.6 46.1 28 90.3 59.6 86.3 65.5l-1.3 2.1-.6.5c.1-.1.8-1 0-3.1-2-6.5-33.4-31.5-85.3-62.9-50.7-30.1-92.9-48.3-97-43.1l1.3-2.6zM351 290.4c3.8-7.6-37.2-38.5-88.1-68.6-52-29.5-89.6-46.9-96.5-41.7L165 183c0 .1 0-.2.4-.5 1.2-1 3.3-1 4.2-1 11.8.2 45.5 15.7 92.8 42.8 20.8 12 87.6 55 87.3 67 0 1 .1 1.2-.3 1.8l1.7-2.6z"/></g><g transform="translate(0 26.7) scale(1.06667)"><path fill="#fff" stroke="#000" stroke-width=".7" d="M180.6 211a58.7 58.7 0 0 0 17.5 41.7 59 59 0 0 0 41.8 17.6 59.4 59.4 0 0 0 42-17.4 59 59 0 0 0 17.4-41.8v-79.2l-118.7-.2V211z"/><path fill="red" stroke="#000" stroke-width=".5" d="M182.8 211.1a56.4 56.4 0 0 0 16.8 40 57 57 0 0 0 40.2 16.8 56.9 56.9 0 0 0 40.2-16.6 56.4 56.4 0 0 0 16.7-40v-77H183v76.8m91-53.7v48.9l-.1 5.1a33.2 33.2 0 0 1-10 24 34 34 0 0 1-24 10c-9.4 0-17.7-4-23.9-10.2a34 34 0 0 1-10-24v-54l68 .2z"/><g id="e"><g id="d" fill="#ff0" stroke="#000" stroke-width=".5"><path stroke="none" d="M190.2 154.4c.1-5.5 4-6.8 4-6.8.1 0 4.3 1.4 4.3 6.9h-8.3"/><path d="m186.8 147.7-.7 6.3h4.2c0-5.2 4-6 4-6 .1 0 4 1.1 4.1 6h4.2l-.8-6.4h-15zm-1 6.4h17c.3 0 .6.3.6.7 0 .5-.3.8-.6.8h-17c-.3 0-.6-.3-.6-.8 0-.4.3-.7.7-.7z"/><path d="M192 154c0-3.3 2.3-4.2 2.3-4.2s2.3 1 2.3 4.2H192m-5.8-9h16.3c.3 0 .6.4.6.8 0 .3-.3.6-.6.6h-16.3c-.3 0-.6-.3-.6-.7 0-.3.3-.6.6-.6zm.4 1.5H202c.3 0 .6.3.6.7 0 .4-.3.7-.6.7h-15.5c-.4 0-.6-.3-.6-.7 0-.4.2-.7.6-.7zm5-10.6h1.2v.8h.9v-.8h1.3v.9h.9v-1h1.2v2c0 .4-.2.6-.5.6h-4.4c-.3 0-.6-.2-.6-.5v-2zm4.6 2.7.3 6.4h-4.3l.3-6.5h3.7"/><path id="a" d="M191 141.6v3.4h-4v-3.4h4z"/><use xlink:href="#a" width="100%" height="100%" x="10.6"/><path id="b" d="M186.3 139h1.2v1h.9v-1h1.2v1h.9v-1h1.2v2c0 .4-.2.6-.5.6h-4.3a.6.6 0 0 1-.6-.6v-2z"/><use xlink:href="#b" width="100%" height="100%" x="10.6"/><path fill="#000" stroke="none" d="M193.9 140.6c0-.6.9-.6.9 0v1.6h-.9v-1.6"/><path id="c" fill="#000" stroke="none" d="M188.6 142.8c0-.6.8-.6.8 0v1.2h-.8v-1.2"/><use xlink:href="#c" width="100%" height="100%" x="10.6"/></g><use xlink:href="#d" width="100%" height="100%" y="46.3"/><use xlink:href="#d" width="100%" height="100%" transform="rotate(-45.2 312.8 180)"/></g><use xlink:href="#d" width="100%" height="100%" x="45.7"/><use xlink:href="#e" width="100%" height="100%" transform="matrix(-1 0 0 1 479.8 0)"/><g id="f" fill="#fff"><path fill="#039" d="M232.6 202.4a8.3 8.3 0 0 0 2.2 5.7 7.2 7.2 0 0 0 5.3 2.4c2.1 0 4-1 5.3-2.4a8.3 8.3 0 0 0 2.2-5.7v-10.8h-15v10.8"/><circle cx="236.1" cy="195.7" r="1.5"/><circle cx="244.4" cy="195.7" r="1.5"/><circle cx="240.2" cy="199.7" r="1.5"/><circle cx="236.1" cy="203.9" r="1.5"/><circle cx="244.4" cy="203.9" r="1.5"/></g><use xlink:href="#f" width="100%" height="100%" y="-26"/><use xlink:href="#f" width="100%" height="100%" x="-20.8"/><use xlink:href="#f" width="100%" height="100%" x="20.8"/><use xlink:href="#f" width="100%" height="100%" y="25.8"/></g></svg></div>
            </div>
        </div>

        <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == "user") {
                echo '
                    <div id="header-account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                    </div>
                    <div class="header-popup-anchor">
                        <div id="header-account-popup" style="right: 999999px; height: 0px;">
                            <a  href="/PA/' . $language . '/profile">' . $lang["LINK_INFORMATIONS"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
                            <a>' . $lang["LINK_DONATION"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16"><path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/><path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/></svg></a>
                            <a>' . $lang["TITLE_HELP"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></a>
                            <a  href="/PA/' . $language . '/signout">' . $lang["LINK_SIGNOUT"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg></a>
                        </div>
                    </div>';
            } else {
                echo '
                    <div style="display: none" id="header-account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                    </div>
                    <div class="header-popup-anchor">
                        <div id="header-account-popup" style="right: 999999px; height: 0px;">
                            <a  href="/PA/' . $language . '/profile">' . $lang["LINK_INFORMATIONS"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
                            <a>' . $lang["LINK_DONATION"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16"><path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/><path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/></svg></a>
                            <a>' . $lang["TITLE_HELP"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></a>
                            <a  href="/PA/' . $language . '/signout">' . $lang["LINK_SIGNOUT"] . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg></a>
                        </div>
                    </div>';
            }
            ?>
    </div>
</header>
<script type="text/javascript">
    var flag_popup_shown = false;
    var flag = document.getElementById("header-flag");
    var flag_popup = document.getElementById("header-flag-popup");

    var account_popup_shown = false;
    var account = document.getElementById("header-account");
    var account_popup = document.getElementById("header-account-popup");

    let header_flag_french = document.getElementById("header-flag-french");
    let header_flag_english = document.getElementById("header-flag-english");
    let header_flag_italian = document.getElementById("header-flag-italian");
    let header_flag_portuguese = document.getElementById("header-flag-portuguese");

    let url = window.location.href;
    if (url.includes("/pt/")) {
        flag.innerHTML = header_flag_portuguese.firstElementChild.outerHTML;
    } else if (url.includes("/en/")) {
        flag.innerHTML = header_flag_english.firstElementChild.outerHTML;
    } else if (url.includes("/it/")) {
        flag.innerHTML = header_flag_italian.firstElementChild.outerHTML;
    } else {
        flag.innerHTML = header_flag_french.firstElementChild.outerHTML;
    }

    function update_tooltips() {
        if (flag_popup_shown) {
            flag_popup.style.right = "1rem";
            flag_popup.style.height = "12rem";
        } else {
            flag_popup.style.right = "999999px";
            flag_popup.style.height = "0px";
        }
        if (account_popup_shown) {
            account_popup.style.right = "1rem";
            account_popup.style.height = "12rem";
        } else {
            account_popup.style.right = "999999px";
            account_popup.style.height = "0px";
        }
    };

    flag.onclick = function() {
        flag_popup_shown = !flag_popup_shown;
        account_popup_shown = false;
        update_tooltips();
    };

    account.onclick = function() {
        account_popup_shown = !account_popup_shown;
        flag_popup_shown = false;
        update_tooltips();
    };

    function change_language(language) {
        let url = window.location.href;
        let langpart = '/' + language + '/';
        url = url.replace('/en/', langpart);
        url = url.replace('/fr/', langpart);
        url = url.replace('/it/', langpart);
        url = url.replace('/pt/', langpart);
        window.location.href = url;
    }

    header_flag_french.onclick = function() { change_language("fr") }
    header_flag_english.onclick = function() { change_language("en") }
    header_flag_italian.onclick = function() { change_language("it") }
    header_flag_portuguese.onclick = function() { change_language("pt") }
</script>
