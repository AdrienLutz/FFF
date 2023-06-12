<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
    <a class="navbar-brand blue_color" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Favorite players</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
        <li class="nav-item">
        <p class="nav-link" id="ethPrice">Mbappe' left leg price : </p>
        <script>
              async function getPrice() {
                const response = await fetch("https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=eur");
                const jsonData = await response.json();
                let elt = document.getElementById("ethPrice");
                elt.innerText = "ETH: " + jsonData.ethereum.eur + " €";
                }
                setInterval(getPrice(),
                    5000);
        </script>
      </li>
      </ul>
    </div>
  </div>
</nav>