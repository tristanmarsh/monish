<html>

<head>
  <style>
  body {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    background: #222;
    font-family: 'VT323', system, sans-serif;
    cursor: pointer;
  }

  .page {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 100%;
    height: 100%;
    background: #1c2373;
    overflow: hidden;
    -webkit-transition: width .25s ease-out .3s, height .25s ease-out;
    transition: width .25s ease-out .3s, height .25s ease-out;
  }
  .page.warp .confirm {
    opacity: 0;
    visibility: hidden;
  }
  .page.warp .confirm .inner {
    -webkit-animation: fade 1s steps(4);
    animation: fade 1s steps(4);
  }
  .page.warp .hacking-time {
    opacity: 1;
    visibility: visible;
  }
  .page.warp .hacking-time .inner {
    -webkit-animation: fadeIn 1s steps(4, end) 4s;
    animation: fadeIn 1s steps(4, end) 4s;
  }
  .page.warp .hacking-time .progress:before {
    width: 100%;
  }
  .page.warp .grid {
    opacity: 1;
    visibility: visible;
  }
  .page.warp .grid:before {
    clip: rect(0, 2000px, 1000px, 0);
  }
  .page.warp .grid:after {
    clip: rect(0, 2000px, 1000px, 0);
  }
  .page.warp #kung-fury {
    bottom: 40%;
    z-index: 1;
  }
  .page.warp #kung-fury .inner {
    -webkit-animation: hovering 10s infinite;
    animation: hovering 10s infinite;
  }
  .page.abort {
    width: 1%;
    height: 1%;
  }

  .confirm {
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    z-index: 2;
    width: 220px;
    height: 200px;
    line-height: 40px;
    font-size: 40px;
    color: white;
    text-transform: uppercase;
    opacity: 1;
    visibility: visible;
    -webkit-transition: opacity 0s linear 1s, visibility 0s linear 1s;
    transition: opacity 0s linear 1s, visibility 0s linear 1s;
  }
  .confirm input,
  .confirm label {
    cursor: pointer;
  }
  .confirm label {
    position: relative;
    display: block;
    float: left;
    width: 50%;
    margin: 10px 0 0 0;
    text-align: center;
  }
  .confirm label:hover:before {
    content: '>';
    position: absolute;
    left: 10px;
  }
  .confirm input {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    clip: rect(0, 0, 0, 0);
  }
  .confirm input:checked + label:before {
    content: '';
  }
  .confirm input:checked + label span {
    padding: 0 5px;
    -webkit-animation: blink .25s alternate infinite;
    animation: blink .25s alternate infinite;
  }

  .hacking-time {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    bottom: 50%;
    width: 100%;
    max-width: 400px;
    height: 100%;
    max-height: 200px;
    line-height: 40px;
    font-size: 40px;
    color: white;
    text-transform: uppercase;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: opacity 0s linear 4s, visibility 0s linear 4s;
    transition: opacity 0s linear 4s, visibility 0s linear 4s;
  }
  .hacking-time .inner {
    opacity: 1;
    visibility: visibile;
  }
  .hacking-time h1 {
    font-weight: 300;
    line-height: 0px;
    font-size: 63px;
  }
  .hacking-time .progress {
    position: relative;
    height: 40px;
    width: 100%;
    margin: 0 0 15px 0;
    border: 3px solid white;
  }
  .hacking-time .progress:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0%;
    background: white;
    -webkit-transition: width 10s linear 5s;
    transition: width 10s linear 5s;
  }

  #kung-fury {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    bottom: -100%;
    -webkit-transition: bottom .75s ease-out 3.5s;
    transition: bottom .75s ease-out 3.5s;
  }
  #kung-fury .inner {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 4px;
    height: 4px;
    box-shadow: 15px 6px 0 #474BB7,18px 6px 0 #474BB7,21px 6px 0 #474BB7,12px 9px 0 #474BB7,15px 9px 0 #474BB7,18px 9px 0 #474BB7,21px 9px 0 #474BB7,24px 9px 0 #474BB7,9px 12px 0 #474BB7,12px 12px 0 #E75BCA,15px 12px 0 #E75BCA,18px 12px 0 #E75BCA,21px 12px 0 #E75BCA,24px 12px 0 #E75BCA,27px 12px 0 #E75BCA,30px 12px 0 #E75BCA,36px 12px 0 #E75BCA,39px 12px 0 #E75BCA,42px 12px 0 #E75BCA,45px 12px 0 #E75BCA,48px 12px 0 #E75BCA,51px 12px 0 #E75BCA,9px 15px 0 #8896E5,12px 15px 0 #E75BCA,15px 15px 0 #E75BCA,18px 15px 0 #E75BCA,21px 15px 0 #E75BCA,24px 15px 0 #E75BCA,27px 15px 0 #E75BCA,30px 15px 0 #E75BCA,33px 15px 0 #E75BCA,45px 15px 0 #E75BCA,48px 15px 0 #E75BCA,51px 15px 0 #E75BCA,54px 15px 0 #E75BCA,9px 18px 0 #8896E5,12px 18px 0 #AEC0E2,15px 18px 0 #7867E9,18px 18px 0 #E75BCA,21px 18px 0 #E75BCA,24px 18px 0 #E75BCA,27px 18px 0 #E75BCA,30px 18px 0 #474BB7,54px 18px 0 #E75BCA,9px 21px 0 #8896E5,12px 21px 0 #F2F8FB,15px 21px 0 #8896E5,18px 21px 0 #474BB7,21px 21px 0 #474BB7,24px 21px 0 #474BB7,27px 21px 0 #474BB7,12px 24px 0 #8896E5,15px 24px 0 #8896E5,18px 24px 0 #474BB7,21px 24px 0 #474BB7,24px 24px 0 #474BB7,27px 24px 0 #474BB7,15px 27px 0 #8896E5,18px 27px 0 #7867E9,21px 27px 0 #474BB7,24px 27px 0 #474BB7,27px 27px 0 #474BB7,18px 30px 0 #7867E9,21px 30px 0 #7867E9,24px 30px 0 #7867E9,27px 30px 0 #8896E5,30px 30px 0 #8896E5,33px 30px 0 #8896E5,15px 33px 0 #7867E9,18px 33px 0 #7867E9,21px 33px 0 #7867E9,24px 33px 0 #7867E9,27px 33px 0 #7867E9,30px 33px 0 #474BB7,33px 33px 0 #474BB7,36px 33px 0 #474BB7,15px 36px 0 #7867E9,18px 36px 0 #7867E9,21px 36px 0 #8896E5,24px 36px 0 #8896E5,27px 36px 0 #7867E9,30px 36px 0 #7867E9,33px 36px 0 #7867E9,36px 36px 0 #474BB7,39px 36px 0 #474BB7,18px 39px 0 #7867E9,21px 39px 0 #8896E5,24px 39px 0 #8896E5,27px 39px 0 #7867E9,30px 39px 0 #7867E9,33px 39px 0 #7867E9,36px 39px 0 #474BB7,39px 39px 0 #474BB7,42px 39px 0 #474BB7,18px 42px 0 #7867E9,21px 42px 0 #8896E5,24px 42px 0 #7867E9,27px 42px 0 #7867E9,30px 42px 0 #7867E9,33px 42px 0 #7867E9,36px 42px 0 #7867E9,39px 42px 0 #7867E9,42px 42px 0 #474BB7,18px 45px 0 #7867E9,21px 45px 0 #8896E5,24px 45px 0 #7867E9,27px 45px 0 #7867E9,30px 45px 0 #7867E9,33px 45px 0 #7867E9,36px 45px 0 #7867E9,39px 45px 0 #7867E9,42px 45px 0 #474BB7,45px 45px 0 #7867E9,18px 48px 0 #7867E9,21px 48px 0 #8896E5,24px 48px 0 #7867E9,27px 48px 0 #7867E9,30px 48px 0 #7867E9,33px 48px 0 #474BB7,36px 48px 0 #7867E9,39px 48px 0 #7867E9,42px 48px 0 #474BB7,45px 48px 0 #7867E9,18px 51px 0 #7867E9,21px 51px 0 #AEC0E2,24px 51px 0 #7867E9,27px 51px 0 #7867E9,30px 51px 0 #7867E9,33px 51px 0 #474BB7,36px 51px 0 #7867E9,39px 51px 0 #7867E9,42px 51px 0 #7867E9,45px 51px 0 #7867E9,18px 54px 0 #7867E9,21px 54px 0 #AEC0E2,24px 54px 0 #7867E9,27px 54px 0 #7867E9,30px 54px 0 #7867E9,33px 54px 0 #474BB7,36px 54px 0 #7867E9,39px 54px 0 #7867E9,42px 54px 0 #7867E9,45px 54px 0 #7867E9,48px 54px 0 #7867E9,18px 57px 0 #7867E9,21px 57px 0 #AEC0E2,24px 57px 0 #7867E9,27px 57px 0 #7867E9,30px 57px 0 #7867E9,33px 57px 0 #474BB7,36px 57px 0 #7867E9,39px 57px 0 #7867E9,42px 57px 0 #7867E9,45px 57px 0 #7867E9,48px 57px 0 #7867E9,18px 60px 0 #7867E9,21px 60px 0 #AEC0E2,24px 60px 0 #7867E9,27px 60px 0 #7867E9,30px 60px 0 #7867E9,33px 60px 0 #474BB7,36px 60px 0 #7867E9,39px 60px 0 #474BB7,42px 60px 0 #7867E9,45px 60px 0 #7867E9,48px 60px 0 #7867E9,15px 63px 0 #7867E9,18px 63px 0 #7867E9,21px 63px 0 #AEC0E2,24px 63px 0 #7867E9,27px 63px 0 #474BB7,30px 63px 0 #7867E9,33px 63px 0 #7867E9,36px 63px 0 #7867E9,39px 63px 0 #7867E9,42px 63px 0 #7867E9,45px 63px 0 #474BB7,48px 63px 0 #7867E9,51px 63px 0 #7867E9,15px 66px 0 #7867E9,18px 66px 0 #474BB7,21px 66px 0 #AEC0E2,24px 66px 0 #7867E9,27px 66px 0 #7867E9,30px 66px 0 #474BB7,33px 66px 0 #7867E9,36px 66px 0 #7867E9,39px 66px 0 #7867E9,42px 66px 0 #7867E9,45px 66px 0 #7867E9,48px 66px 0 #474BB7,51px 66px 0 #7867E9,15px 69px 0 #8896E5,18px 69px 0 #8896E5,21px 69px 0 #7867E9,24px 69px 0 #7867E9,27px 69px 0 #7867E9,30px 69px 0 #474BB7,33px 69px 0 #7867E9,36px 69px 0 #7867E9,39px 69px 0 #7867E9,42px 69px 0 #7867E9,45px 69px 0 #7867E9,48px 69px 0 #474BB7,51px 69px 0 #7867E9,54px 69px 0 #7867E9,15px 72px 0 #B39EC5,18px 72px 0 #AEC0E2,21px 72px 0 #7867E9,24px 72px 0 #7867E9,27px 72px 0 #7867E9,30px 72px 0 #474BB7,33px 72px 0 #7867E9,36px 72px 0 #7867E9,39px 72px 0 #7867E9,42px 72px 0 #7867E9,45px 72px 0 #7867E9,48px 72px 0 #7867E9,51px 72px 0 #474BB7,54px 72px 0 #474BB7,18px 75px 0 #B39EC5,21px 75px 0 #B39EC5,24px 75px 0 #B39EC5,27px 75px 0 #7867E9,30px 75px 0 #474BB7,33px 75px 0 #474BB7,36px 75px 0 #7867E9,39px 75px 0 #7867E9,42px 75px 0 #7867E9,45px 75px 0 #7867E9,48px 75px 0 #7867E9,51px 75px 0 #7867E9,54px 75px 0 #474BB7,21px 78px 0 #F2F8FB,24px 78px 0 #AEC0E2,27px 78px 0 #474BB7,30px 78px 0 #474BB7,33px 78px 0 #7867E9,36px 78px 0 #7867E9,39px 78px 0 #7867E9,42px 78px 0 #7867E9,45px 78px 0 #7867E9,48px 78px 0 #7867E9,51px 78px 0 #7867E9,54px 78px 0 #7867E9,57px 78px 0 #7867E9,21px 81px 0 #F2F8FB,24px 81px 0 #AEC0E2,27px 81px 0 #B39EC5,30px 81px 0 #E75BCA,33px 81px 0 #E75BCA,36px 81px 0 #E75BCA,39px 81px 0 #7867E9,42px 81px 0 #7867E9,45px 81px 0 #7867E9,48px 81px 0 #474BB7,51px 81px 0 #7867E9,54px 81px 0 #8896E5,57px 81px 0 #7867E9,21px 84px 0 #AEC0E2,24px 84px 0 #AEC0E2,27px 84px 0 #B39EC5,30px 84px 0 #E75BCA,33px 84px 0 #E75BCA,36px 84px 0 #E75BCA,39px 84px 0 #E75BCA,42px 84px 0 #7867E9,45px 84px 0 #7867E9,48px 84px 0 #7867E9,51px 84px 0 #474BB7,54px 84px 0 #7867E9,57px 84px 0 #8896E5,60px 84px 0 #7867E9,21px 87px 0 #AEC0E2,24px 87px 0 #AEC0E2,27px 87px 0 #AEC0E2,33px 87px 0 #E75BCA,36px 87px 0 #E75BCA,39px 87px 0 #E75BCA,42px 87px 0 #8896E5,45px 87px 0 #7867E9,48px 87px 0 #7867E9,51px 87px 0 #474BB7,54px 87px 0 #474BB7,57px 87px 0 #7867E9,60px 87px 0 #8896E5,18px 90px 0 #AEC0E2,21px 90px 0 #AEC0E2,24px 90px 0 #AEC0E2,27px 90px 0 #AEC0E2,33px 90px 0 #E75BCA,36px 90px 0 #E75BCA,39px 90px 0 #E75BCA,42px 90px 0 #E75BCA,45px 90px 0 #7867E9,48px 90px 0 #7867E9,51px 90px 0 #7867E9,54px 90px 0 #474BB7,57px 90px 0 #474BB7,60px 90px 0 #8896E5,63px 90px 0 #7867E9,18px 93px 0 #AEC0E2,21px 93px 0 #AEC0E2,24px 93px 0 #AEC0E2,27px 93px 0 #B39EC5,36px 93px 0 #E75BCA,39px 93px 0 #E75BCA,42px 93px 0 #E75BCA,45px 93px 0 #8896E5,48px 93px 0 #7867E9,51px 93px 0 #7867E9,54px 93px 0 #7867E9,57px 93px 0 #474BB7,60px 93px 0 #474BB7,63px 93px 0 #7867E9,18px 96px 0 #AEC0E2,21px 96px 0 #AEC0E2,24px 96px 0 #B39EC5,36px 96px 0 #E75BCA,39px 96px 0 #E75BCA,42px 96px 0 #E75BCA,45px 96px 0 #E75BCA,48px 96px 0 #7867E9,51px 96px 0 #7867E9,54px 96px 0 #7867E9,57px 96px 0 #474BB7,60px 96px 0 #474BB7,63px 96px 0 #474BB7,66px 96px 0 #7867E9,15px 99px 0 #AEC0E2,18px 99px 0 #AEC0E2,21px 99px 0 #AEC0E2,24px 99px 0 #B39EC5,36px 99px 0 #E75BCA,39px 99px 0 #E75BCA,42px 99px 0 #E75BCA,45px 99px 0 #E75BCA,48px 99px 0 #8896E5,51px 99px 0 #7867E9,54px 99px 0 #7867E9,57px 99px 0 #7867E9,60px 99px 0 #474BB7,63px 99px 0 #474BB7,66px 99px 0 #474BB7,69px 99px 0 #474BB7,9px 102px 0 #AEC0E2,12px 102px 0 #AEC0E2,15px 102px 0 #F2F8FB,18px 102px 0 #F2F8FB,21px 102px 0 #B39EC5,39px 102px 0 #E75BCA,42px 102px 0 #E75BCA,45px 102px 0 #E75BCA,48px 102px 0 #474BB7,51px 102px 0 #7867E9,54px 102px 0 #7867E9,57px 102px 0 #7867E9,60px 102px 0 #474BB7,63px 102px 0 #474BB7,66px 102px 0 #474BB7,69px 102px 0 #474BB7,9px 105px 0 #AEC0E2,12px 105px 0 #474BB7,15px 105px 0 #474BB7,18px 105px 0 #B39EC5,39px 105px 0 #E75BCA,42px 105px 0 #E75BCA,45px 105px 0 #E75BCA,48px 105px 0 #E75BCA,51px 105px 0 #7867E9,54px 105px 0 #7867E9,57px 105px 0 #7867E9,60px 105px 0 #7867E9,63px 105px 0 #474BB7,66px 105px 0 #474BB7,9px 108px 0 #AEC0E2,12px 108px 0 #AEC0E2,15px 108px 0 #474BB7,18px 108px 0 #474BB7,21px 108px 0 #474BB7,39px 108px 0 #E75BCA,42px 108px 0 #E75BCA,45px 108px 0 #E75BCA,48px 108px 0 #E75BCA,51px 108px 0 #7867E9,54px 108px 0 #7867E9,57px 108px 0 #7867E9,60px 108px 0 #7867E9,63px 108px 0 #474BB7,12px 111px 0 #AEC0E2,15px 111px 0 #AEC0E2,18px 111px 0 #AEC0E2,36px 111px 0 #8896E5,39px 111px 0 #474BB7,42px 111px 0 #474BB7,45px 111px 0 #474BB7,48px 111px 0 #474BB7,51px 111px 0 #474BB7,54px 111px 0 #7867E9,57px 111px 0 #7867E9,60px 111px 0 #7867E9,33px 114px 0 #8896E5,36px 114px 0 #AEC0E2,39px 114px 0 #AEC0E2,42px 114px 0 #AEC0E2,45px 114px 0 #AEC0E2,48px 114px 0 #AEC0E2,51px 114px 0 #7867E9,54px 114px 0 #7867E9,57px 114px 0 #7867E9,30px 117px 0 #8896E5,33px 117px 0 #AEC0E2,36px 117px 0 #AEC0E2,39px 117px 0 #AEC0E2,42px 117px 0 #AEC0E2,45px 117px 0 #8896E5,48px 117px 0 #8896E5,51px 117px 0 #8896E5,54px 117px 0 #474BB7,27px 120px 0 #8896E5,30px 120px 0 #AEC0E2,33px 120px 0 #AEC0E2,36px 120px 0 #AEC0E2,39px 120px 0 #AEC0E2,42px 120px 0 #8896E5,45px 120px 0 #8896E5,48px 120px 0 #8896E5,51px 120px 0 #8896E5,24px 123px 0 #8896E5,27px 123px 0 #8896E5,30px 123px 0 #AEC0E2,33px 123px 0 #AEC0E2,36px 123px 0 #8896E5,39px 123px 0 #8896E5,42px 123px 0 #8896E5,45px 123px 0 #474BB7,48px 123px 0 #474BB7,21px 126px 0 #8896E5,24px 126px 0 #AEC0E2,27px 126px 0 #AEC0E2,30px 126px 0 #AEC0E2,33px 126px 0 #8896E5,36px 126px 0 #8896E5,39px 126px 0 #8896E5,42px 126px 0 #474BB7,45px 126px 0 #7867E9,21px 129px 0 #8896E5,24px 129px 0 #AEC0E2,27px 129px 0 #AEC0E2,30px 129px 0 #8896E5,33px 129px 0 #8896E5,36px 129px 0 #8896E5,39px 129px 0 #474BB7,42px 129px 0 #7867E9,18px 132px 0 #8896E5,21px 132px 0 #AEC0E2,24px 132px 0 #AEC0E2,27px 132px 0 #8896E5,30px 132px 0 #8896E5,33px 132px 0 #8896E5,36px 132px 0 #8896E5,39px 132px 0 #7867E9,15px 135px 0 #8896E5,18px 135px 0 #AEC0E2,21px 135px 0 #AEC0E2,24px 135px 0 #AEC0E2,27px 135px 0 #8896E5,30px 135px 0 #8896E5,33px 135px 0 #474BB7,36px 135px 0 #7867E9,15px 138px 0 #8896E5,18px 138px 0 #AEC0E2,21px 138px 0 #AEC0E2,24px 138px 0 #8896E5,27px 138px 0 #8896E5,30px 138px 0 #8896E5,33px 138px 0 #7867E9,15px 141px 0 #AEC0E2,18px 141px 0 #AEC0E2,21px 141px 0 #AEC0E2,24px 141px 0 #8896E5,27px 141px 0 #8896E5,30px 141px 0 #7867E9,12px 144px 0 #8896E5,15px 144px 0 #8896E5,18px 144px 0 #AEC0E2,21px 144px 0 #AEC0E2,24px 144px 0 #8896E5,27px 144px 0 #7867E9,30px 144px 0 #474BB7,12px 147px 0 #8896E5,15px 147px 0 #8896E5,18px 147px 0 #8896E5,21px 147px 0 #AEC0E2,24px 147px 0 #8896E5,27px 147px 0 #7867E9,30px 147px 0 #7867E9,33px 147px 0 #474BB7,12px 150px 0 #8896E5,15px 150px 0 #474BB7,18px 150px 0 #474BB7,21px 150px 0 #AEC0E2,24px 150px 0 #8896E5,27px 150px 0 #474BB7,30px 150px 0 #7867E9,33px 150px 0 #474BB7,12px 153px 0 #8896E5,15px 153px 0 #8896E5,18px 153px 0 #AEC0E2,21px 153px 0 #AEC0E2,24px 153px 0 #474BB7,27px 153px 0 #474BB7,30px 153px 0 #7867E9,33px 153px 0 #7867E9,36px 153px 0 #474BB7,15px 156px 0 #8896E5,18px 156px 0 #AEC0E2,21px 156px 0 #AEC0E2,24px 156px 0 #8896E5,27px 156px 0 #8896E5,30px 156px 0 #7867E9,33px 156px 0 #7867E9,36px 156px 0 #7867E9,39px 156px 0 #474BB7,15px 159px 0 #8896E5,18px 159px 0 #AEC0E2,21px 159px 0 #AEC0E2,24px 159px 0 #8896E5,27px 159px 0 #8896E5,30px 159px 0 #8896E5,33px 159px 0 #7867E9,36px 159px 0 #7867E9,39px 159px 0 #7867E9,42px 159px 0 #474BB7,18px 162px 0 #8896E5,21px 162px 0 #AEC0E2,24px 162px 0 #AEC0E2,27px 162px 0 #8896E5,30px 162px 0 #8896E5,33px 162px 0 #8896E5,36px 162px 0 #7867E9,39px 162px 0 #7867E9,42px 162px 0 #7867E9,45px 162px 0 #474BB7,21px 165px 0 #8896E5,24px 165px 0 #AEC0E2,27px 165px 0 #AEC0E2,30px 165px 0 #8896E5,33px 165px 0 #8896E5,36px 165px 0 #8896E5,39px 165px 0 #7867E9,42px 165px 0 #7867E9,45px 165px 0 #7867E9,48px 165px 0 #474BB7,24px 168px 0 #8896E5,27px 168px 0 #AEC0E2,30px 168px 0 #AEC0E2,33px 168px 0 #8896E5,36px 168px 0 #8896E5,39px 168px 0 #8896E5,42px 168px 0 #7867E9,45px 168px 0 #7867E9,48px 168px 0 #7867E9,51px 168px 0 #474BB7,27px 171px 0 #8896E5,30px 171px 0 #AEC0E2,33px 171px 0 #AEC0E2,36px 171px 0 #8896E5,39px 171px 0 #8896E5,42px 171px 0 #8896E5,45px 171px 0 #7867E9,48px 171px 0 #7867E9,51px 171px 0 #7867E9,54px 171px 0 #474BB7,30px 174px 0 #8896E5,33px 174px 0 #AEC0E2,36px 174px 0 #AEC0E2,39px 174px 0 #8896E5,42px 174px 0 #8896E5,45px 174px 0 #8896E5,48px 174px 0 #7867E9,51px 174px 0 #7867E9,54px 174px 0 #474BB7,15px 177px 0 #8896E5,18px 177px 0 #8896E5,21px 177px 0 #8896E5,24px 177px 0 #8896E5,27px 177px 0 #8896E5,30px 177px 0 #8896E5,33px 177px 0 #8896E5,36px 177px 0 #AEC0E2,39px 177px 0 #AEC0E2,42px 177px 0 #8896E5,45px 177px 0 #8896E5,48px 177px 0 #8896E5,51px 177px 0 #7867E9,54px 177px 0 #474BB7,6px 180px 0 #8896E5,9px 180px 0 #8896E5,12px 180px 0 #8896E5,15px 180px 0 #AEC0E2,18px 180px 0 #F2F8FB,21px 180px 0 #AEC0E2,24px 180px 0 #AEC0E2,27px 180px 0 #AEC0E2,30px 180px 0 #AEC0E2,33px 180px 0 #AEC0E2,36px 180px 0 #AEC0E2,39px 180px 0 #AEC0E2,42px 180px 0 #AEC0E2,45px 180px 0 #8896E5,48px 180px 0 #8896E5,51px 180px 0 #8896E5,54px 180px 0 #474BB7,6px 183px 0 #8896E5,9px 183px 0 #AEC0E2,12px 183px 0 #AEC0E2,15px 183px 0 #AEC0E2,18px 183px 0 #F2F8FB,21px 183px 0 #F2F8FB,24px 183px 0 #474BB7,27px 183px 0 #474BB7,30px 183px 0 #474BB7,33px 183px 0 #E75BCA,36px 183px 0 #E75BCA,39px 183px 0 #7867E9,42px 183px 0 #7867E9,45px 183px 0 #8896E5,48px 183px 0 #8896E5,51px 183px 0 #8896E5,54px 183px 0 #7867E9,6px 186px 0 #8896E5,9px 186px 0 #AEC0E2,12px 186px 0 #8896E5,15px 186px 0 #AEC0E2,18px 186px 0 #AEC0E2,21px 186px 0 #F2F8FB,24px 186px 0 #B39EC5,27px 186px 0 #474BB7,30px 186px 0 #474BB7,33px 186px 0 #474BB7,36px 186px 0 #474BB7,39px 186px 0 #474BB7,42px 186px 0 #8896E5,45px 186px 0 #7867E9,48px 186px 0 #E75BCA,51px 186px 0 #E75BCA,54px 186px 0 #7867E9,6px 189px 0 #8896E5,9px 189px 0 #AEC0E2,12px 189px 0 #8896E5,15px 189px 0 #7867E9,18px 189px 0 #AEC0E2,21px 189px 0 #F2F8FB,24px 189px 0 #F2F8FB,27px 189px 0 #B39EC5,30px 189px 0 #B39EC5,33px 189px 0 #B39EC5,36px 189px 0 #B39EC5,39px 189px 0 #8896E5,42px 189px 0 #8896E5,45px 189px 0 #7867E9,48px 189px 0 #E75BCA,51px 189px 0 #E75BCA,54px 189px 0 #7867E9,6px 192px 0 #8896E5,9px 192px 0 #AEC0E2,12px 192px 0 #B39EC5,15px 192px 0 #7867E9,18px 192px 0 #AEC0E2,21px 192px 0 #F2F8FB,24px 192px 0 #F2F8FB,27px 192px 0 #F2F8FB,30px 192px 0 #8896E5,33px 192px 0 #8896E5,36px 192px 0 #8896E5,39px 192px 0 #8896E5,42px 192px 0 #E75BCA,45px 192px 0 #E75BCA,48px 192px 0 #E75BCA,51px 192px 0 #E75BCA,54px 192px 0 #7867E9,6px 195px 0 #8896E5,9px 195px 0 #AEC0E2,12px 195px 0 #B39EC5,15px 195px 0 #7867E9,18px 195px 0 #AEC0E2,21px 195px 0 #F2F8FB,24px 195px 0 #F2F8FB,27px 195px 0 #F2F8FB,30px 195px 0 #474BB7,33px 195px 0 #474BB7,36px 195px 0 #474BB7,39px 195px 0 #474BB7,42px 195px 0 #474BB7,45px 195px 0 #474BB7,48px 195px 0 #474BB7,51px 195px 0 #474BB7,54px 195px 0 #474BB7,6px 198px 0 #8896E5,9px 198px 0 #AEC0E2,12px 198px 0 #AEC0E2,15px 198px 0 #7867E9,18px 198px 0 #AEC0E2,21px 198px 0 #AEC0E2,24px 198px 0 #F2F8FB,27px 198px 0 #F2F8FB,30px 198px 0 #B39EC5,33px 198px 0 #B39EC5,36px 198px 0 #B39EC5,39px 198px 0 #B39EC5,42px 198px 0 #B39EC5,45px 198px 0 #B39EC5,48px 198px 0 #B39EC5,51px 198px 0 #B39EC5,9px 201px 0 #AEC0E2,12px 201px 0 #AEC0E2,15px 201px 0 #474BB7,18px 201px 0 #474BB7,21px 201px 0 #AEC0E2,24px 201px 0 #F2F8FB,27px 201px 0 #F2F8FB,30px 201px 0 #F2F8FB,33px 201px 0 #F2F8FB,36px 201px 0 #F2F8FB,39px 201px 0 #F2F8FB,42px 201px 0 #F2F8FB,45px 201px 0 #F2F8FB,48px 201px 0 #F2F8FB,51px 201px 0 #F2F8FB,9px 204px 0 #AEC0E2,12px 204px 0 #AEC0E2,15px 204px 0 #474BB7,18px 204px 0 #474BB7,21px 204px 0 #AEC0E2,24px 204px 0 #AEC0E2,27px 204px 0 #AEC0E2,30px 204px 0 #AEC0E2,33px 204px 0 #AEC0E2,36px 204px 0 #AEC0E2,39px 204px 0 #AEC0E2,42px 204px 0 #AEC0E2,45px 204px 0 #AEC0E2,48px 204px 0 #AEC0E2,51px 204px 0 #AEC0E2,9px 207px 0 #8896E5,12px 207px 0 #AEC0E2,15px 207px 0 #AEC0E2,18px 207px 0 #AEC0E2,21px 207px 0 #AEC0E2,24px 207px 0 #AEC0E2,27px 207px 0 #AEC0E2,30px 207px 0 #AEC0E2,33px 207px 0 #AEC0E2,36px 207px 0 #AEC0E2,39px 207px 0 #AEC0E2,42px 207px 0 #AEC0E2,45px 207px 0 #AEC0E2,48px 207px 0 #AEC0E2,51px 207px 0 #AEC0E2,9px 210px 0 #8896E5,12px 210px 0 #8896E5,15px 210px 0 #8896E5,18px 210px 0 #8896E5,21px 210px 0 #8896E5,24px 210px 0 #8896E5,27px 210px 0 #8896E5,30px 210px 0 #8896E5,33px 210px 0 #8896E5,36px 210px 0 #8896E5,39px 210px 0 #8896E5,42px 210px 0 #8896E5,45px 210px 0 #8896E5,48px 210px 0 #8896E5,51px 210px 0 #8896E5;
  }

  .grid {
    width: 100%;
    height: 100%;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-perspective: 1000px;
    perspective: 1000px;
    opacity: 0;
    visibility: hidden;
    -webkit-transition: opacity 0s linear 2s, visibility 0s linear 2s;
    transition: opacity 0s linear 2s, visibility 0s linear 2s;
  }
  .grid:before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    background-image: -webkit-linear-gradient(0deg, transparent 19%, rgba(210, 78, 218, 0.5) 24%, #ee2efa 25%, #ee2efa 26%, rgba(210, 78, 218, 0.5) 27%, transparent 32%, transparent 69%, rgba(210, 78, 218, 0.5) 74%, #ee2efa 75%, #ee2efa 76%, rgba(210, 78, 218, 0.5) 77%, transparent 82%, transparent);
    background-image: linear-gradient(90deg, transparent 19%, rgba(210, 78, 218, 0.5) 24%, #ee2efa 25%, #ee2efa 26%, rgba(210, 78, 218, 0.5) 27%, transparent 32%, transparent 69%, rgba(210, 78, 218, 0.5) 74%, #ee2efa 75%, #ee2efa 76%, rgba(210, 78, 218, 0.5) 77%, transparent 82%, transparent);
    background-size: 100px 100px;
    border-top: 6px solid #d24eda;
    clip: rect(0, 2000px, 1px, 0);
    -webkit-transform: rotateX(80deg) scale(2);
    transform: rotateX(80deg) scale(2);
    -webkit-transform-origin: bottom center;
    -ms-transform-origin: bottom center;
    transform-origin: bottom center;
    -webkit-transition: clip 2s ease-out 2s;
    transition: clip 2s ease-out 2s;
  }
  .grid:after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    background-image: -webkit-linear-gradient(90deg, transparent 19%, rgba(210, 78, 218, 0.5) 24%, #ee2efa 25%, #ee2efa 26%, rgba(210, 78, 218, 0.5) 27%, transparent 32%, transparent 69%, rgba(210, 78, 218, 0.5) 74%, #ee2efa 75%, #ee2efa 76%, rgba(210, 78, 218, 0.5) 77%, transparent 82%, transparent);
    background-image: linear-gradient(0deg, transparent 19%, rgba(210, 78, 218, 0.5) 24%, #ee2efa 25%, #ee2efa 26%, rgba(210, 78, 218, 0.5) 27%, transparent 32%, transparent 69%, rgba(210, 78, 218, 0.5) 74%, #ee2efa 75%, #ee2efa 76%, rgba(210, 78, 218, 0.5) 77%, transparent 82%, transparent);
    background-size: 100px 100px;
    clip: rect(0, 2000px, 1px, 0);
    -webkit-transform: rotateX(80deg) scale(2);
    transform: rotateX(80deg) scale(2);
    -webkit-transform-origin: bottom center;
    -ms-transform-origin: bottom center;
    transform-origin: bottom center;
    -webkit-transition: clip 5.75s ease-out 2.5s;
    transition: clip 5.75s ease-out 2.5s;
    -webkit-animation: rad .2s linear infinite;
    animation: rad .2s linear infinite;
  }

  @-webkit-keyframes blink {
    0%, 49% {
      color: white;
      background: #1c2373;
    }
    50%, 100% {
      color: #1c2373;
      background: white;
    }
  }

  @keyframes blink {
    0%, 49% {
      color: white;
      background: #1c2373;
    }
    50%, 100% {
      color: #1c2373;
      background: white;
    }
  }
  @-webkit-keyframes fade {
    100% {
      opacity: 0;
      visibility: hidden;
    }
  }
  @keyframes fade {
    100% {
      opacity: 0;
      visibility: hidden;
    }
  }
  @-webkit-keyframes fadeIn {
    0% {
      opacity: 0;
      visibility: hidden;
    }
    100% {
      opacity: 1;
      visibility: visible;
    }
  }
  @keyframes fadeIn {
    0% {
      opacity: 0;
      visibility: hidden;
    }
    100% {
      opacity: 1;
      visibility: visible;
    }
  }
  @-webkit-keyframes abort {
    25% {
      clip: rect();
    }
  }
  @keyframes abort {
    25% {
      clip: rect();
    }
  }
  @-webkit-keyframes rad {
    100% {
      background-position: 0px 50px;
    }
  }
  @keyframes rad {
    100% {
      background-position: 0px 50px;
    }
  }
  @-webkit-keyframes hovering {
    0%, 10%, 30%, 45%, 80% {
      top: 1%;
      right: 0%;
      bottom: 0%;
      left: 1%;
    }
    15%, 75%, 40%, 55%, 95% {
      top: 0;
      right: 1%;
      bottom: 1%;
      left: 0%;
    }
    5%, 25%, 35%, 60%, 70%, 90% {
      top: 1%;
      right: 1%;
      bottom: 0%;
      left: 0%;
    }
    50%, 30%, 20%, 65%, 85%, 100% {
      top: 0%;
      right: 0%;
      bottom: 1%;
      left: 1%;
    }
  }
  @keyframes hovering {
    0%, 10%, 30%, 45%, 80% {
      top: 1%;
      right: 0%;
      bottom: 0%;
      left: 1%;
    }
    15%, 75%, 40%, 55%, 95% {
      top: 0;
      right: 1%;
      bottom: 1%;
      left: 0%;
    }
    5%, 25%, 35%, 60%, 70%, 90% {
      top: 1%;
      right: 1%;
      bottom: 0%;
      left: 0%;
    }
    50%, 30%, 20%, 65%, 85%, 100% {
      top: 0%;
      right: 0%;
      bottom: 1%;
      left: 1%;
    }
  }
  </style>

</head>

<body>
  <div class='page'>
    <div class='confirm'>
      <div class='inner'>
        You're about to hack time, are you Sure?
        <input id='warp' name='hack' type='radio' value='yes'>
        <label for='warp'>
          <span>Yes</span>
        </label>
        <input id='nope' name='hack' type='radio' value='no'>
        <label for='nope'>
          <span>No</span>
        </label>
      </div>
    </div>
    <div id='kung-fury'>
      <div class='inner'></div>
    </div>
    <div class='grid'></div>
    <div class='hacking-time'>
      <div class='inner'>
        <h1>Hacking time...</h1>
        <div class='progress'></div>
        Years hacked:
        <span id='years'>0</span>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="sfsf" />
</body>



</html>