<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

<!-- START OF WHAT ADMINISTRATORS SEES -->
<?php if ($user['role'] === "admin") : ?>

<style>

    @font-face {
        font-family: 'Merriweather Sans';
        font-style: italic;
        font-weight: 800;
        src: local('Merriweather Sans ExtraBold Italic'), local('MerriweatherSans-ExtraBldItalic'), url(http://fonts.gstatic.com/s/merriweathersans/v5/nAqt4hiqwq3tzCecpgPmVfrUSW10CwTuVx9PepRx9ls.woff2) format('woff2'), url(http://fonts.gstatic.com/s/merriweathersans/v5/nAqt4hiqwq3tzCecpgPmVW2xy75WLVt7UI7Cycabsy8.woff) format('woff');
    }

    @font-face {
        font-family: "open";
        font-style: normal;
        font-weight: 300;
        src: local( "Open Sans Light" ), local( "OpenSans-Light" ),
        url( https://themes.googleusercontent.com/static/fonts/opensans/v6/DXI1ORHCpsQm3Vp6mXoaTZ1r3JsPcQLi8jytr04NNhU.woff ) format( 'woff' );
    }

    *, *:before, *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .section {
        width: 400px;
        margin: 7px auto;
        height: 69px;
        box-shadow: 0 1px 2px rgba( 0, 0, 0, .2 );
        overflow: hidden;
        -webkit-transition: .35s;
        transition: .35s;
    }

    .title {
        padding: 20px;
        padding-top: 24px;
        background: #00C37E;
        color: #fff;
        cursor: pointer;
        text-shadow: 0 1px 0 #666;
        width: 100%;
        text-transform: capitalize;
        font-family: 'Merriweather Sans', sans-serif;
        font-style: italic;
        position: relative;
        -moz-user-select: none;
        -ms-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        z-index: 10;
    }

    .title:before, .title:after {
        content: "";
        display: block;
        position: absolute;
        right: 20px;
        top: 21px;
        font-style: normal;
        height: 21px;
        line-height: 1;
        overflow: hidden;
        font-family: FontAwesome;
        font-size: 20px;
        background: #00C37E;
        -webkit-transition: .35s;
        transition: .35s;
    }

    .title:before {
        z-index: 2;
    }
    .title:after {
        top: 25px;
        -webkit-transform: rotate( 180deg );
        -ms-transform: rotate( 180deg );
        -moz-transform: rotate( 180deg );
        transform: rotate( 180deg );
    }

    .open .title:before {
        height: 0;
    }

    .body {
        font: 16px open, sans-serif;
        background: #fff;
        padding: 20px 20px 40px;
        color: #777;
        -moz-transform: translateY( -100% );
        -ms-transform: translateY( -100% );
        -webkit-transform: translateY( -100% );
        transform: translateY( -100% );
        overflow: hidden;
        -webkit-transition: .35s;
        transition: .35s;
    }
    .body h2 {
        color: #333;
        font-size: 22px;
        margin-bottom: 10px;
    }
    .body h2:before {
        content: '▪';
        padding-right: 7px;
        color: #00C37E;
    }
    .body a {
        color: #00C37E;
    }
    .body span {
        font-size: 12px;
    }

    .section.open {
        height: 288px;
    }
    .open .body {
        -webkit-transform: none;
        -ms-transform: none;
        -moz-transform: none;
        transform: none;
    }

</style>
<html>

    <meta charset="UTF-8" />
    <title>Arrowination</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

<body>

<div class="section">

    <div class="title">

        click here

    </div>

    <div class="body">

        <h2>Just look at the arrow above</h2>

        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

        <br/>
        <br/>

        <span>Crafted by: <a href="http://linkedin.com/in/mrReiha">Reiha Hosseini</a></span>

    </div>

</div>

<div class="section">

    <div class="title">

        click here

    </div>

    <div class="body">

        <h2>Just look at the arrow above</h2>

        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

        <br/>
        <br/>

        <span>Crafted by: <a href="http://linkedin.com/in/mrReiha">Reiha Hosseini</a></span>

    </div>

</div>

<div class="section">

    <div class="title">

        click here

    </div>

    <div class="body">

        <h2>Just look at the arrow above</h2>

        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

        <br/>
        <br/>

        <span>Crafted by: <a href="http://linkedin.com/in/mrReiha">Reiha Hosseini</a></span>

    </div>

</div>

</body>

</html>
<script>
    /**
     * ---------------------------------------------
     * Javscript is just for make elements clickable
     * Effects are on the css only
     * ---------------------------------------------
     * @since 2015/06/10
     * @author Reiha Hosseini ( @mrReiha )
     */
    ;!( function( w, d ) {

        'use strict';

        var titles = d.querySelectorAll( '.title' ),

            i = 0,
            len = titles.length;

        for ( ; i < len; i++ )
            titles[ i ].onclick = function( e ) {

                for ( var j = 0; j < len; j++ )
                    if ( this != titles[ j ] )
                        titles[ j ].parentNode.className = titles[ j ].parentNode.className.replace( / open/i, '' );

                var cn = this.parentNode.className;

                this.parentNode.className = ~cn.search( /open/i ) ? cn.replace( / open/i, '' ) : cn + ' open';

            };

    })( this, document );

</script>

<!-- START OF WHAT TENANTS SEES -->
<?php elseif ($user['role'] === "tenant") : ?>

    <h3>Registered Devices</h3>
    <?= $this->Html->link('Update MAC Addresses', ['action' => 'edit', $personEntity->macaddress->id]); ?>
    <table>
        <tr>
            <th>#</th>
            <th>Device Name</th>
            <th>Mac Address</th>
        </tr>
        <!-- ONE -->
        <tr>
            <td><strong>1</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_one === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_one ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_one === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_one ?>
            </td>
        </tr>
        <!-- TWO -->
        <tr>
            <td><strong>2</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_two === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_two ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_two === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_two ?>
            </td>
        </tr>
        <!-- THREE -->
        <tr>
            <td><strong>3</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_three === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_three ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_three === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_three ?>
            </td>
        </tr>
        <!-- FOUR -->
        <tr>
            <td><strong>4</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_four === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_four ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_four === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_four ?>
            </td>
        </tr>
        <!-- FIVE -->
        <tr>
            <td><strong>5</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_five === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_five ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_five === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_five ?>
            </td>
        </tr>
        <!-- SIX -->
        <tr>
            <td><strong>6</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_six === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_six ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_six === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_six ?>
            </td>
        </tr>
        <!-- SEVEN -->
        <tr>
            <td><strong>7</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_seven === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_seven ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_seven === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_seven ?>
            </td>
        </tr>
        <!-- EIGHT -->
        <tr>
            <td><strong>8</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_eight === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_eight ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_eight === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_eight ?>
            </td>
        </tr>
        <!-- NINE -->
        <tr>
            <td><strong>9</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_nine === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_nine ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_nine === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_nine ?>
            </td>
        </tr>
        <!-- TEN -->
        <tr>
            <td><strong>10</strong></td>
            <td>
                <?php if ($personEntity->macaddress->device_name_ten === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->device_name_ten ?>
            </td>
            <td>
                <?php if ($personEntity->macaddress->mac_address_ten === "") : ?>
                <?php endif; ?>
                <?= $personEntity->macaddress->mac_address_ten ?>
            </td>
        </tr>

    </table>

<?php endif; ?>