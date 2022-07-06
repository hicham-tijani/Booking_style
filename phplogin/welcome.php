<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>UserDashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="dashboard_style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
 
  <div class="app-left">
    <button class="close-menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="app-logo">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAElUlEQVRoge2YXWwUVRTHf+cO/QAEDEZIFHTbook+CC+oMeWhMEXFiEaxEoTA7tZgUIlUHvDBpGmiGAVMJCQa2y6pEg2aQkCbQpcUQ0WCIVEDGLTsthWURBEUDLjtzPGhVNplt/s1GzTZXzLJzp1zz/9/9t65M3OhQIECBQoUKFDgP4dcbwPJmNbYPrnYFD0G+qgid4DeCpQAvQgRVT4p0dLWE8HKC5BlIdO2Hxw7iVPOsZqamJfmASqa9z3gitahLASKUoT/JqIrI/7q1rQL8YU6feI6LyI8BUwHQPgFpQuR3TGjbaeX22ezcr99u1X2101PoO7LIPdl2l2QJWkVUr517zx1zecMDm0yHJAuEd0ljrXrZG1Vd6q8Mz5sm+jGioKKrAZ8afpOxNn0CmnqWKci6zPJLHDcFdnlqn7QF7CPj8jX0nGbDshqoBaYlEneJBwYk05UEWO3xORyJcojmWQX5aQRKzJ0Xh4Kz8alTgdYBKSlnQaHzBhnUUY3e1lzeCmwAZg6SljYVdnUG5jbjohSX298t1cuFKUOmJOL4zhiorp+7IRzrx+rqYllvGr5Qp03iuu8hvAcYIaSAh+jZlM0OPdbgKkte8aP67dWIPoSyAwPC0DRNnVY2/ts9fdDbVk/R8pD4dmqvKkihxzX2fxTcP7PANOb9t5iiXlBYCUw2QPfwzmC8ErUb3fEXxAY/PdKY+bOItN/qjuw4NdsFHyhvbNEzRpgMVCcm984hMPiaEMkaLchoglDfM3hpwUagRsABwiNu2StOfZ81cWUAqpSvrXzYXW1DtF5npof5CsVGnr8dnuqQClrDvcx9IC7ygkVd3GPf/43iTr5Qp2lwsAyVNYAd3lgOJ4uhIZEUygZUtbc8WOSm/Eyytpo0N4y1FDRsmeK9ptVKmYV6M2eWB5p56iruro3aHdm3LOsKfwqQkPSANjhKJuNsARYCpTmYnU0VLSqx1+9P5u+Mq2xfXKRGdMHjPfYV6Z8HQ3Y92bb2Zyqfeh3RVq8dJQNIvpGLv0NgItuYHDFuj4oP0R6v9yZSwoD0BewI6Ls9sbVCPTKMTrCRurr3VyEzNWfujGXRHFcUmjGlftJPdJnVKycp/a/hUSC1V3AodzSabeKrItZTO8J2EGxVEnxlivwTo+/6nJuunEiorpBRT7NMMcfwE6EbdEVdnj4K4SqzEwxsy4MlJS8m6FeQszwk0jAbkXYlka/MwjbFH3cuhibGg3YK6J+u+Pa9yB35qhZlPf7nplzLlPTiRg57CIaVV1W3hT+yDU8aRCfCyUgZ0Q5jfAdKgeiwbkn0ksvs0a52G+51tvZW49T8irRNahKWWjfeWBiQmFha8Rv+72SM6lDsqOiaX8FSYoAVBzHy1Uyf4W4xhltWn12svbBo17q5a0QkOQ3uvCW12p5LEQTj4hwOOq3D3itlsdCuCdRo0JG+2PpkpdV68qnwTXbpwoHe/zzKpN9d+dCXkakWKy7EzSft1xreT6KgHxNLcOU4acCp0WYn85+cLZ4tW05gr+NfFHscARlAmijKel/r3vpgj/zoVWgQIEC/0/+AfmvjfLSy4TjAAAAAElFTkSuQmCC">
      <span>DreanTrip</span>
    </div>
    <ul class="nav-list">
      <li class="nav-list-item ">
        <a class="nav-list-link" href="../index.html">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAC1ElEQVRIieWVzUtUYRTGn/Pee9VRkybNtDTmyxZJSBIVKPkVuhIiqCAonSSkRdJfoNJ/kEFg2Fw3EShJ0ELQEQtK0mjVrho1BEdBy0zHj7n3PS1kaMaZtPEqRT27+5zznt9733PgAH9ItJND7u6BMimVFoBZCHk/0Fj7OhKrrGxXF9ImCzRDCKGtzY32P15MVEMkC3XqgzelFC8AvgzgipTipVMfvB2JL2qf/cKkCZM4EDZSgiV1DcXWwMzkejTYDqaHANSoiAKmDqfPfw/t7QJABQNXFSY3AV9UFqd2DHbow2lOfegJE7VtkdbiKix/CgAKc/Ct3zfOgMFMCdupJjKjdaxzOCcsjWcgKtsulwkXACBsz7Fvl7vlH7v0gaKwZo78DjRaKydLHhz1+Y/vCOz2DVUzizEARclAl85VwDiYm6cAb1hVbUmBHT5/gwT3A9ifDBQAwkcKwIoCAPs4NTV3zeOpTJQX23hmcvn8bUzUGhfbgbSpKZg5OZA2W8eEt+YOiDgOXNzTkxL6bu8C0TWrwF+ol0m5PumtWgUiT81MoeUDfXsIBYBLxGZv5IMA4HDn8/RUzbaEqBdQZ2egzs9bIhnZ2TAO5UVbvBZeyZxurg+pADDdXB9y+Py3iPgiQCfAyFcWFqDNzlgCs6JsgAlBgN8zU990c30ISDBALt2vM6PREnGTiNA97j3vjfaSXhK7pf8PvO2S2CxaCUH5FrvbZVYWZHr63oG1qSlkjrwCpIwNCIHlsnKsFxTuDTh1PIB1hxPLp88AkTXLjIyxUaQEAkmBk+uxacDMyPgJBQCiDc80kir190y1ZOZEiVaUqGYcWIA+7jZYMD5sC5ak6ACsbYdYzbEkfbMZN9WT3qoZd9fwWVMYdwlUCkCLxMiU+cIwVgF8jT4jDMNOpkwDEIyywwx6pwq0frpRM2vp6qW13urSuiZPnF/X5Cmt9VZbKv7P6wecwACI2SV+/wAAAABJRU5ErkJggg==">
        &nbsp;&nbsp; Home
        </a>
      </li>
      <li class="nav-list-item active">
        <a class="nav-list-link" href="#">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAfCAYAAAAfrhY5AAAABmJLR0QA/wD/AP+gvaeTAAAEfklEQVRIibWXW2xUZRDHf3PO7va2vS1EjMHSXcEauRiThotglLJF5RFwE0gAewMakiYa9UUf1gd5MSRKQNNAW0XQsJEHU+kdS0JtwKQxPvCA1m6LQCTGSmRt2dsZHwr1gN1DC+s8zvef+c33ZTKZT8iSLTjWXZCfNj9DeVnhZIF3vPFiKJRwipFsgB9rbs/3uPPaBaru+BTtcMWSm4ebNsUzxRkPC15wrLsgx53fYQcDCLIp7fUcdIp9OHgkYuanXKdBX5hZoL//L/Clh/u9gT9LvYL1dSZN0jQ+yTp86eF+70ReulM90gOSm0mXm447Ntyc4RUtA4UTeelOYB3KSoX9IBGQdwG1a9PqCTnlmlO3V7QMFCaY7ERk7T1HQ6YnUZVOeA4A9Tb/BMrbSU196TJzPIamGxF9pDRR2jS0pzI5a7gD+LbpMBjFoCbgc0wmnPIlSraZswEvPt5RlLS0SzKCAcQHFBiWuUINaxjkFYeUT08a8Ufve/PFxzuK0glPF7BmNoUqDFrQYMIFwOsgvekInyv4Hrsm0K6wm5l762jGZw809xZbuLofEAzIVY/mhixJpYB7h9BXvmRJ7YzwQHNvsbrpBln9YGAA5qclVQ1aAFLxb02c8iVLts/Y7TbwqocA32UKe0W1CENW+RIl24b2VCan6rBZeVt/iZDuRlmZLfAUXb+bcFsvXd+xcQKR6UE0PeECzb3FoqmurIMBFeP6wsl5CTt4Gl7e1l+ibunN5lPbLAl66UbO+H8uJWUnzpWa8XgPUJldpg6DnFdIiLAYZS2q58UltSO7gj8BSKC1r0PBaRrN1a6o0DBaE+yyO/1HzyzC0EPAGtTYEK2r+lH8rX1/AYXZoApcNdLm6uGG9VdmFITDRnnZ858L1koV13ID5Ug2wAAq0pgJvDAymBdYtHZpwaSxB8QratUb0V8H3lJoteluAeMPwB6L1mxoB3gx3O+66yQSMd2xiZOq8vHFfetjKvIpoq8ahMPW6OWBBpT9gr6R7x0vjtYG56noeuDaHODfA5S39jWNlaUHF0YG8+4cBGK+A8BzIlbtlEcvoCybqjActqLwjj3TaE312UUtZ+oN0Y5ZgJNAHCBpcsKT5nX3zb+bgZ3+lr59CnsRqkdqNv58W38L8DiuUfNTxX2A4x4GtIvqfoQnAa7uCv5hWboZkS3+lt5jCB8C9dGa4DlbTIXCmCP8t9wbRYDbCZzvHd8qptmOUhlo61kCMFZf/YMouxHZIarvR2uDx6cjVEVgu0CXI9xtyZtk3vO+yfeOb70YCiV+ea1qSOGsIoeIREyAkbrgCdR4aqQ2+J49yN/2bR3KCnHpQeftVcmZ0S+cNmOJrfa/mMuQ3ajxrD8274uKloFCgGhd1SX7PPe3nqkHPYxo08jO6svOa1Q4bPjL1rUCu+4C30xsmekP9sTR7mWWmKcQSgTaLOG8WhIX0SWCbgd5BtGmaE31kalU97Nw2PA/vu4DDLapapcrlmx0+vyVt/Xnilr1oCFgOZADjKJ0ils/GtlZffmO9h+L7LvWIzkhLQAAAABJRU5ErkJggg==">
        &nbsp;&nbsp; Prenotazioni
        </a>
      </li>
      <li class="nav-list-item">
        <a class="nav-list-link" href="logout.php">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB0AAAAdCAYAAABWk2cPAAAABmJLR0QA/wD/AP+gvaeTAAADXElEQVRIicWWTWhcVRTHf+dOJohVamMVtTCdmVZJ0278oGrrxkmGSgutiJCCpvjeoOLCTTVupDKQhS5E7M5W7cSCWBShUUgJyVSFCpXoQjRpLWXeSyC46cfQxEoT3z0ukpkM8/maFP0v73nn/M65vHPPgf9BEvbD2LGxrjbYp9AlsEHhLoGiwozAZBDoyamX0+dWD81mTXLjzv2q5hBoZ4h45wQZKDipE4joTUM3D57eaq09rvBICFi1fgngwLTbMxkaGs+NPSPKCWDtCoAlzSra57vpoZbQ5Ceje9TIEBBZBbCkQMTsLTip4YbQeG6kUzRyltVVWK3ZiDFPXnwpNVE6MGVTNmuMRj6/xUCAOwNrB1EtF1iGJjfu3N/spxE4hfA1ENQxXwO+An5u4P5YfDDfWwNdbIvGsojvOT3PoxyuzUjfjMzN96G0N/I3Sjm+wGJ7BNb+3gwKqAq7/1lz+w/Rueu/Ag8unkrec1PpZC7/nsJbTQNIsMV3dp03ANbavS2AACLKkdvmi1EVfQVQ4JpErbvps9EdCm+0DtG2D5au1yLbQkABYsFC+we+k/5ekY+A/r+wl601OUK0mFi7tQwFvS8kFJRMMnd6N2IOek73x2sC8z6lq24p8wBAG4DA3aGhgKp9zXd7hh+a/279QlQyoR1F18NSpQqXb4L5t0rQv+n4yL0XXn36ksC74bOVS2WoCH+GThZ9Oz7VftEGkW8Tn44eiE1HBmjcn1XOOrMMtdqqXUo6U5j+8fB0LOhH2Y7Ih979N+4RURe40cpZYaIMDSw1k6COrotYNxZ7qlPhnaWzdSbadrTgpH8T1WyrAKJmCCoe/MSxsUlgSxOX1zsW1h65Ei3+BDxcZezz7rjyRWKu4wzwRD1vhQnf7dkGFc+gIAMt0jx4NVr06gABjibmOi4Am5tEKMdfHm2qksjlx4FHm8JXpnHP6X68tMIsjzYRVQleBIq3GDgbMcap3JlMpdV3dp0XMS9Qf3ytRIFV6a0c4DVQgIKTGlZ0D6uveBY1z01luk9VG2qgAL6bHrGB7iBs09dqXCXY7mVS39QzNt97VSU+mO81yiGFrlakpeYf8J3uL1e091YrnhvpNNY8q9ClIhsE1ilcFdUZNWZCrJz0Mqk/wsb7z/UvkOc+FbFaCUwAAAAASUVORK5CYII=">
        &nbsp;&nbsp; Esci
        </a>
      </li>
     
  </div>
  <div class="app-main">
    <div class="main-header-line">
      <div class="action-buttons">
        <button class="open-right-area">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      </button>
      <button class="menu-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
      </div>
    </div>
    <div class="chart-row three">
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Applications</h2>
            <span>20.5 K</span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart pink">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">30%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Shortlisted</h2>
            <span>5.5 K</span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart blue">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">60%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>On-hold</h2>
            <span>10.5 K</span>
          </div>
           <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart orange">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="90, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">90%</text>
    </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="chart-row two">
      <div class="chart-container-wrapper big">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Top Active Jobs</h2>
            <span>Last 30 days</span>
          </div>
          <div class="line-chart">
            <canvas id="chart"></canvas>
          </div>
          <div class="chart-data-details">
            <div class="chart-details-header"></div>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper small">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Acquisitions</h2>
            <span href="#">This month</span>
          </div>
          <div class="acquisitions-bar">
           <span class="bar-progress rejected" style="width:8%;"></span>
            <span class="bar-progress on-hold" style="width:10%;"></span>
            <span class="bar-progress shortlisted" style="width:18%;"></span>
            <span class="bar-progress applications" style="width:64%;"></span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color applications"></span>
            <span class="progress-type">Applications</span>
            <span class="progress-amount">64%</span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color shortlisted"></span>
            <span class="progress-type">Shortlisted</span>
            <span class="progress-amount">18%</span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color on-hold"></span>
            <span class="progress-type">On-hold</span>
            <span class="progress-amount">10%</span>
          </div>
          <div class="progress-bar-info">
            <span class="progress-color rejected"></span>
            <span class="progress-type">Rejected</span>
            <span class="progress-amount">8%</span>
          </div>
        </div>
       
        </div>
      </div>
    </div>
  </div>
  <div class="app-right">
    <button class="close-right">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="profile-box">

      <div class="profile-photo-wrapper">
        <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="profile">
      </div>
      
      <p class="profile-text"><?php echo  $_SESSION['username']; ?></p>
    </div>
   
    </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'></script>
  <script  src="dashboard_style.js"></script>

</body>
</html>
