<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn-shape {
  transition: all .3s linear;
  width: 168px;
  height: 50px;
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  outline: none;
  background-color: #020202;
  border-radius: 50px;
  border: 0px;
  position: relative;
  z-index: 99;
  cursor: pointer;
}

.btn-shape::after,
.btn-shape::before {
  content: '';
  position: absolute;
  background-color: #020202;
  width: 100%;
  opacity: 0;
  height: 100%;
  left: 0;
  border-radius: 100px;
  bottom: 0;
  z-index: -2;
  transition: all .3s linear;
}

.btn-shape span {
  font-size: 16px;
  font-weight: 700;
  transition: all .3s linear;
  color: #fff;
  text-transform: capitalize;
}

.btn-shape:hover {
  transform: translate(-12px, -12px);
}

.btn-shape:hover:after {
  transform: translate(6px, 6px);
  opacity: .5;
}

.btn-shape:hover::before {
  transform: translate(12px, 12px);
  opacity: .3;
}

.btn-shape:hover span {
  animation: storm .4s linear both;
}

@keyframes storm {
  0% {
    transform: translate3d(0, 0, 0) translateZ(0);
  }

  25% {
    transform: translate3d(4px, 0, 0) translateZ(0);
  }

  50% {
    transform: translate3d(-3px, 0, 0) translateZ(0);
  }

  75% {
    transform: translate3d(2px, 0, 0) translateZ(0);
  }

  100% {
    transform: translate3d(0, 0, 0) translateZ(0);
  }
}
    </style>
</head>
<body>
<button href ="aaaa" class="btn-shape">
    <span class="title">
      hover me
    </span>
</button>
</body>
</html>