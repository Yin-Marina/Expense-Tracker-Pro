<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group6">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/report.css">
  </head>
  <body>
    <nav class="navbar">
      <div class="logo">
        <img src="./img/logo.png" alt="logo" />
        <div class="logo-name">Expense Tracker Pro</div>
      </div>
      <div class="nav-menu">
        <a href="index.html">Home</a>
  
        <a href="input.html">Input</a>
  
        <a href="report.html">Report</a>
  
        <a href="login.html">Sign in</a>
      </div>
    </nav>

    <div class="container">
      <div class="searchWrap">
        <div class="search">
          <input type="text" class="searchInput" placeholder="Search for expenses">
          <button class="searchButton">Search</button>
        </div>
      </div>
      <div class="filters">
        <div class="filter">
          <div class="from">
            <label for="from">From:</label>
            <input type="date" name="from">
          </div>
          <div class="to">
            <label for="to">To:</label>
            <input type="date" name="to">
          </div>
        </div>
        <div class="sorts">
          <div class="sort">
            <label for="sortLevel">Sort type by:</label>
            <select name="sortLevel" id="sortLevel">
                <option value="low">Ascending order</option>
                <option value="high">Descending order</option>
            </select>
          </div>
          <div class="sort">
            <label for="sortLevel">Sort amount by:</label>
            <select name="sortLevel" id="sortLevel">
                <option value="low">Lowest to highest</option>
                <option value="high">Highest to lowest</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <table>
        <tr>
          <th>Date</th>
          <th>Amount</th>
          <th>Type</th>
          <th>Memo</th>
        </tr>
        <tr>
          <td>2022.10.10</td>
          <td>$10.00</td>
          <td>Grocery</td>
          <td>Food</td>
        </tr>
        <tr>
          <td>2022.10.10</td>
          <td>$10.00</td>
          <td>Grocery</td>
          <td>Food</td>
        </tr>
        <tr>
          <td>2022.10.10</td>
          <td>$10.00</td>
          <td>Grocery</td>
          <td>Food</td>
        </tr>
        <tr>
          <td>2022.10.10</td>
          <td>$10.00</td>
          <td>Grocery</td>
          <td>Food</td>
        </tr>
        <tr>
          <td>2022.10.10</td>
          <td>$10.00</td>
          <td>Grocery</td>
          <td>Food</td>
        </tr>
        <tr>
          <td>2022.10.10</td>
          <td>$10.00</td>
          <td>Grocery</td>
          <td>Food</td>
        </tr>
      </table>
    </div>
  </body>
</html>
