<?php

	echo("html {
	    overflow-y: scroll;
		}

		* {
		    margin: 0;
		    padding: 0;
		    box-sizing: border-box;
		    /*scroll-behavior: smooth;*/
		}
		
		body {
	    background-color: #CDFCF6;
	    min-height: 100vh;
	    overflow: hidden;
	    background: linear-gradient(to right, white, #CDFCF6 5%, #CDFCF6 95%, white);
		}

		/* ------------ Navigation Bar Start ------------ */

		header {
		    position: fixed;
		    top: 0;
		    right: 0;
		    display: flex;
		    justify-content: space-between;
		    width: 100%;
		    background: #98A8F8;
		    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
		    z-index: 1000;
		    border-radius: 0 0 0 40px;
		}

		.logo {
		    height: 60px;
		    line-height: 60px;
		    color: #12334e;
		    font-weight: 700;
		    font-size: 2em;
		    text-decoration: none;
		    cursor: pointer;
		    padding-left: 20px;
		}

		#toggle {
		    position: absolute;
		    top: 0;
		    right: 0;
		    width: 60px;
		    height: 60px;
		    background: #98A8F8;
		    cursor: pointer;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		}

		#toggle::before {
		    content: '';
		    position: absolute;
		    width: 28px;
		    height: 2px;
		    background: #fff;
		    transform: translateY(-5px);
		    transition: 0.2s;
		}

		#toggle::after {
		    content: '';
		    position: absolute;
		    width: 28px;
		    height: 2px;
		    background: #fff;
		    transform: translateY(5px);
		    transition: 0.2s;
		}

		#toggle.active::before {
		    transform: translateY(0px) rotate(45deg);
		}

		#toggle.active::after {
		    transform: translateY(0px) rotate(-45deg);
		}

		#toggle.active{
		    background:  #BCCEF8;
		}

		#navbar {
		    position: relative;
		    height: 60px;
		    right: 60px;
		    background: #98A8F8;
		    transition: 0.5s;
		    width: 0px;
		    overflow: hidden;
		}

		#navbar.active {
		    width: 460px;
		}

		#navbar ul {
		    position: relative;
		    display: flex;
		    flex-direction: row;
		}

		#navbar ul li{
		    list-style: none;
		}

		#navbar ul li a {
		    color: #12334e;
		    height: 60px;
		    line-height: 60px;
		    display: inline-block;
		    text-decoration: none;
		    font-size: 1.2em;
		    padding: 0 15px;
		    letter-spacing: 2px;
		}

		#navbar ul li a:hover {
		    color: #98A8F8;
		    background: #12334e;
		}

		section{
		    position: relative;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    min-height: 20vh;
		    color: #98A8F8;
		    font-size: 10vw;
		    font-weight: 700;
		}

		.pag_title {
		    margin-top: 75px;
		}

		@media (max-width: 990px) {
		    #navbar{
		        position: fixed;
		        bottom: -100%;
		        right: 0;
		        width: 100%;
		        transition: 0.5s;
		        display: flex;
		        justify-content: center;
		        align-items: center;
		        height: calc(100vh - 60px);
		    }

		    #navbar.active {
		        height: calc(100vh - 60px);
		        bottom: 0;
		        width: 100%;
		    }

		    #navbar ul {
		        flex-direction: column;
		        justify-content: center;
		        align-items: center;
		    }
		}");

?>