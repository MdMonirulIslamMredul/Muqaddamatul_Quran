<style>
  @import url('https://fonts.maateen.me/solaiman-lipi/font.css');

  .form-control:focus {
    box-shadow: none;
    transition: all .1s linear;
    border-color: #1266f1;
    box-shadow: inset 0 0 0 1px #1266f1;
    color: #4f4f4f;
    background-color: #fff;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(18 102 241 / 25%);
  }

  .form-outline {
    position: relative;
  }

  .form-outline .form-control {
    min-height: auto;
    background: transparent;
    transition: all .2s linear;
  }

  .form-outline .form-control~.form-label {
    position: absolute;
    top: 0;
    max-width: 90%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    left: 0.75rem;
    padding-top: 0.37rem;
    pointer-events: none;
    transform-origin: 0 0;
    transition: all .2s ease-out;
    color: rgba(0, 0, 0, .6);
    margin-bottom: 0;
  }

  .form-outline .form-control:focus {
    box-shadow: none !important;
  }

  .form-outline .form-control.active~.form-label,
  .form-outline .form-control:focus~.form-label {
    color: #1266f1;
    background: #ffffff;
    padding-left: 5px;
    padding-right: 5px;
    transform: translateY(-1rem) translateY(0.1rem) scale(.8);
  }

  .form-outline i {
    position: absolute;
    top: 0.65em !important;
    right: 0.65em;
  }

  .modal .form-outline i {
    top: 3em;
  }

  .form-outline.has-error {
    color: #ff0000;
  }

  .login-container .btn {
    width: 100%;
  }

  .login-container .tab-content {
    min-height: 350px;
  }

  .login-heading {
    font-weight: 700;
    font-size: 2.25rem;
    line-height: 1.2;
  }

  .login-subheading {
    font-size: 1.125rem;
    color: #4A5568;
  }

  .login-box {
    max-width: 26rem;
  }

  .login-form {
    margin-top: 2rem;
    border-radius: 0.5rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    border: 1px solid rgb(0, 0, 0, 0.06);
  }

  /**
 * Loading
 */
  .zloading {
    display: none;
  }

  .zloading svg {
    -webkit-animation: rotate 2s linear infinite;
    animation: rotate 2s linear infinite;
    -webkit-transform-origin: center center;
    transform-origin: center center;
    height: 28px;
    width: 28px;
    margin: auto;
  }

  .path {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
    -webkit-animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
    animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
    stroke-linecap: round;
  }

  @-webkit-keyframes rotate {
    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  @keyframes rotate {
    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  @-webkit-keyframes dash {
    0% {
      stroke-dasharray: 1, 200;
      stroke-dashoffset: 0;
    }

    50% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -35px;
    }

    100% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -124px;
    }
  }

  @keyframes dash {
    0% {
      stroke-dasharray: 1, 200;
      stroke-dashoffset: 0;
    }

    50% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -35px;
    }

    100% {
      stroke-dasharray: 89, 200;
      stroke-dashoffset: -124px;
    }
  }

  @-webkit-keyframes color {

    100%,
    0% {
      stroke: #d62d20;
    }

    40% {
      stroke: #0057e7;
    }

    66% {
      stroke: #008744;
    }

    80%,
    90% {
      stroke: #ffa700;
    }
  }

  @keyframes color {

    100%,
    0% {
      stroke: #d62d20;
    }

    40% {
      stroke: #0057e7;
    }

    66% {
      stroke: #008744;
    }

    80%,
    90% {
      stroke: #ffa700;
    }
  }

  .select2-container {
    display: block !important;
  }

  .select2-container .select2-selection--single {
    height: auto !important;
    padding: 0.375rem 0.75rem;
    min-height: 42px;
  }

  .select2-container .select2-selection__arrow {
    height: 100% !important;
  }

  .form-group.pass:not(.required) span.text-danger {
    display: none;
  }

  a {
    text-decoration: none;
    color: #212529;
  }

  .border-bottom-dotted {
    border-bottom: 1px dotted !important;
  }

  /** BV **/
  .bv-validate-form .form-group {
    position: relative;
  }

  .bv-validate-form .form-group .form-control-feedback {
    position: absolute;
    right: 0.5em;
    top: -1.2em;
  }

  .bv-validate-form .form-group .form-control-feedback.fa-times {
    color: red;
  }

  .bv-validate-form.hide-success .form-group .form-control-feedback.fa-check {
    display: none !important;
  }

  .bv-validate-form .form-group .help-block {
    position: absolute;
    right: 2em;
    top: -1.2em;
    line-height: 1;
    color: red;
  }

  .bv-validate-form.user-profile .form-group .form-control-feedback,
  .bv-validate-form.user-profile .form-group .help-block {
    top: 0.5em;
  }

  .form-center input {
    text-align: center;
  }

  /**
 * Css for Print Screen
 */
  @media print {
    body {
      font-size: 0.87rem !important;
    }

    .print-shadow-0 {
      box-shadow: none !important;
    }

    .print-m-0 {
      margin: 0 !important;
    }

    .print-mb-2 {
      margin-bottom: 0.5rem !important;
    }

    .print-card {
      background-clip: unset !important;
      border: none !important;
      border-radius: unset !important;
    }

    .print-p-0 {
      padding: 0 !important;
    }

    .print-lh {
      line-height: 1.8 !important;
    }

    .bv-validate-form p {
      margin-bottom: 0.25em;
    }

    .font-14 {
      font-size: 14px;
    }
  }


  .border-style {
    width: 200px;
    height: 60px;
    border: 8px solid rgba(128, 128, 128, 0.735);
    color: rgba(128, 128, 128, 0.883);
    border-radius: 50%;
  }

  .seal-border {
    width: 120px;
    height: 120px;
    border-radius: 100%;
  }

  .seal-border {
    width: 120px;
    height: 120px;
    border-radius: 50%;
  }

  .digit-number-border {
    margin-left: -5px;
    background-color: transparent;
    border: 1px solid black;
    width: 27px;
    height: 25px;
    text-align: center;
  }

  .passport-digit-border {
    background-color: transparent;
    border: 1px solid black;
    width: 20px;
    height: 27px;
    margin-left: -5px;
    text-align: center;
  }

  .input-area {
    height: 25px;
  }

  .birth-dead-date-border {
    width: 3%;
  }

  .font-size {
    font-size: 16px;
  }

  .bangla-font {
    font-family: 'SolaimanLipi', Arial, sans-serif !important;
  }

  .font-12 {
    font-size: 12px;
  }

  .font-14 {
    font-size: 14px;
  }

  /* bank calan form */
  .bank-code-border {
    width: 40px;
    height: 30px;
    margin-left: -5px;
  }

  .font-14 {
    font-size: 14px;
  }

  .w-60 {
    min-width: 60px;
  }

  .w-65 {
    min-width: 65px;
  }

  .w-35 {
    min-width: 35px;
  }

  .w-45 {
    min-width: 45px;
  }

  .w-55 {
    min-width: 55px;
  }

  .w-80 {
    min-width: 80px;
  }

  .w-120 {
    min-width: 120px;
  }

  .certificate-form .border-bottom-dotted {
    border-bottom: none !important;
  }

  .table>tbody {
    border-top: none !important;
  }

  .table-bordered {
    border-color: #000;
  }

  .certificate-style {
    border: 5px solid #7030A0;
    background-color:white;
  }

  .certificate-style * {
    z-index: 1;
  }

  .certificate-style::before {
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    position: absolute;
    content: "";
    top: 20%;
    left: 20%;
    width: 60%;
    height: 60%;
    opacity: 0.2;
    /* filter: grayscale(100%);
   -webkit-filter: grayscale(100%); */
  }

  .dash-border {
    position: relative;
  }

  .dash-border:before {
    content: "";
    position: absolute;
    border-left: 5px solid #ffdd40;
    height: 60%;
    top: 5px;
    left: 10px;
  }

  .hide {
    display: none;
  }

  .border-gray {
    border-color: #37424c;
  }

  #footer ul {
    list-style: none;
    padding-left: 0;
  }

  #footer ul li a {
    text-decoration: none;
    color: #ffffff;
  }

  .nid-padding {
    width: 120px;
    display: inline-block;
  }

  .wapp-toggle {
    position: fixed;
    z-index: 9999;
    right: 20px;
    bottom: 20px;
  }

  .wapp-toggle img {
    width: 75px;
    height: 75px;
  }

  @media print {
    .wapp-toggle {
      display: none;
    }
  }
</style>