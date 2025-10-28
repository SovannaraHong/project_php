<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <style>
    /* Basic reset */
    *{margin:0;padding:0;box-sizing:border-box;font-family:Arial, sans-serif;}
    body{background:#f9fafb;color:#111827;}

    /* Layout */
    .app{display:flex;min-height:100vh;}
    .sidebar{width:220px;background:#1f2937;color:#f3f4f6;padding:20px;display:flex;flex-direction:column;gap:18px}
    .brand{font-size:20px;font-weight:bold;}
    .menu{list-style:none;display:flex;flex-direction:column;gap:6px;}
    .menu a{color:inherit;text-decoration:none;padding:10px;border-radius:6px;display:block;}
    .menu a.active, .menu a:hover{background:#374151;color:white;}

    .main{flex:1;display:flex;flex-direction:column;}
    header{background:white;padding:16px 24px;border-bottom:1px solid #e5e7eb;display:flex;justify-content:space-between;align-items:center;}
    .search input{padding:8px 12px;border-radius:6px;border:1px solid #d1d5db;width:250px;}
    .content{padding:20px 24px;flex:1;}

    .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:20px;}
    .card{background:white;padding:16px;border-radius:12px;box-shadow:0 1px 4px rgba(0,0,0,0.05);}
    .card h3{font-size:14px;color:#6b7280;margin-bottom:8px;}
    .card p{font-size:20px;font-weight:bold;}

    table{width:100%;border-collapse:collapse;background:white;border-radius:12px;overflow:hidden;}
    th, td{padding:12px 10px;text-align:left;border-bottom:1px solid #e5e7eb;}
    th{background:#f3f4f6;color:#6b7280;font-size:13px;}

    .badge{display:inline-block;padding:4px 8px;border-radius:999px;font-size:12px;}
    .badge.active{background:#d1fae5;color:#065f46;}
    .badge.inactive{background:#fef3c7;color:#b45309;}

    footer{padding:12px 24px;background:white;border-top:1px solid #e5e7eb;text-align:center;font-size:13px;color:#6b7280;}

    @media(max-width:900px){.cards{grid-template-columns:1fr 1fr;}}
    @media(max-width:600px){.cards{grid-template-columns:1fr;}.search input{width:100%;}}
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand">User Panel</div>
      <nav>
        <ul class="menu">
          <li><a href="#" class="active">🏠 Dashboard</a></li>
          <li><a href="#">🛒 My Orders</a></li>
          <li><a href="#">📦 Products</a></li>
          <li><a href="#">⚙️ Settings</a></li>
        </ul>
      </nav>
      <div style="margin-top:auto;font-size:13px;">
        <div class="small">Logged in as</div>
        <div style="font-weight:bold">akira</div>
      </div>
    </aside>

    <main class="main">
      <header>
        <div class="search">
          <input type="text" placeholder="Search products or orders...">
        </div>
        <button style="padding:8px 12px;border-radius:6px;border:none;background:#2563eb;color:white;cursor:pointer">New Order</button>
      </header>

      <section class="content">
        <div class="cards">
          <div class="card">
            <h3>Total Orders</h3>
            <p>24</p>
          </div>
          <div class="card">
            <h3>Pending Orders</h3>
            <p>3</p>
          </div>
          <div class="card">
            <h3>Products Purchased</h3>
            <p>12</p>
          </div>
        </div>

        <h3 style="margin-bottom:12px">Recent Orders</h3>
        <table>
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product</th>
              <th>Status</th>
              <th>Price</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#201</td>
              <td>Blue T-shirt</td>
              <td><span class="badge active">Completed</span></td>
              <td>$20</td>
              <td>Oct 28, 2025</td>
            </tr>
            <tr>
              <td>#200</td>
              <td>Red Sneakers</td>
              <td><span class="badge inactive">Pending</span></td>
              <td>$75</td>
              <td>Oct 27, 2025</td>
            </tr>
            <tr>
              <td>#199</td>
              <td>Jeans</td>
              <td><span class="badge active">Completed</span></td>
              <td>$45</td>
              <td>Oct 26, 2025</td>
            </tr>
          </tbody>
        </table>
      </section>

      <footer>© 2025 Zendo — User Dashboard</footer>
    </main>
  </div>
</body>
</html>
