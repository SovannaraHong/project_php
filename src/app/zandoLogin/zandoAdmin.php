<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <style>
    /* Basic reset */
    *{box-sizing:border-box;margin:0;padding:0;font-family:Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial}
    html,body{height:100%;background:#f3f4f6;color:#111827}

    /* Layout */
    .app{display:flex;min-height:100vh}
    .sidebar{width:260px;background:#0f172a;color:#e6eef8;padding:22px 18px;display:flex;flex-direction:column;gap:20px}
    .brand{font-weight:700;font-size:20px;letter-spacing:0.4px}
    .menu{list-style:none;display:flex;flex-direction:column;gap:6px}
    .menu a{display:flex;gap:10px;align-items:center;padding:10px;border-radius:8px;color:inherit;text-decoration:none}
    .menu a:hover{background:rgba(255,255,255,0.04)}
    .menu a.active{background:linear-gradient(90deg,#2563eb,#7c3aed);color:white}

    /* Header & main */
    .main{flex:1;display:flex;flex-direction:column}
    header{display:flex;align-items:center;justify-content:space-between;padding:18px 24px;background:linear-gradient(90deg,#ffffff 0%,#fbfbfb 100%);border-bottom:1px solid #e6e9ef}
    .search{flex:1;max-width:520px;margin:0 16px}
    .search input{width:100%;padding:10px 12px;border-radius:8px;border:1px solid #e5e7eb}
    .actions{display:flex;gap:12px;align-items:center}
    .btn{padding:8px 12px;border-radius:8px;border:1px solid transparent;background:#111827;color:white;cursor:pointer}
    .btn.secondary{background:transparent;color:#111827;border-color:#e5e7eb}

    /* Content grid */
    .content{padding:20px 24px;display:grid;gap:18px}
    .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
    .card{background:white;border-radius:12px;padding:16px;box-shadow:0 1px 4px rgba(16,24,40,0.04)}
    .card h3{font-size:14px;color:#6b7280;margin-bottom:8px}
    .card p{font-size:22px;font-weight:700}

    /* Table */
    .panel{display:grid;grid-template-columns:1fr 360px;gap:18px}
    .table-wrap{background:white;padding:14px;border-radius:12px;overflow:auto}
    table{width:100%;border-collapse:collapse}
    thead th{text-align:left;font-size:13px;color:#6b7280;padding:10px 8px;border-bottom:1px solid #eef2f7}
    tbody td{padding:12px 8px;border-bottom:1px solid #f1f5f9}
    .badge{display:inline-block;padding:6px 8px;border-radius:999px;font-size:12px}
    .badge.success{background:#ecfdf5;color:#065f46}
    .badge.warn{background:#fff7ed;color:#92400e}
    .small{font-size:13px;color:#6b7280}

    /* Right column (quick actions) */
    .right-panel{background:white;padding:14px;border-radius:12px}
    .form-row{display:flex;flex-direction:column;gap:6px;margin-bottom:10px}
    .form-row input, .form-row select{padding:8px;border-radius:8px;border:1px solid #e5e7eb}

    /* Responsive */
    @media (max-width:1000px){
      .stats{grid-template-columns:repeat(2,1fr)}
      .panel{grid-template-columns:1fr}
      .sidebar{position:fixed;left:0;top:0;bottom:0;transform:translateX(0);z-index:40;transition:transform .2s ease}
      .sidebar.collapsed{transform:translateX(-110%)}
    }

    @media (max-width:640px){
      .stats{grid-template-columns:1fr}
      header{padding:12px}
      .search{display:none}
      .brand{font-size:18px}
    }

    /* small helpers */
    .muted{color:#6b7280}
    .flex{display:flex}
    .gap-8{gap:8px}
    .center{align-items:center}
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar" id="sidebar">
      <div class="brand">Zendo Admin</div>
      <div class="muted">Manage products, users & orders</div>

      <nav>
        <ul class="menu">
          <li><a href="#" class="active">🏠 Dashboard</a></li>
          <li><a href="#">🧾 Orders</a></li>
          <li><a href="#">📦 Products</a></li>
          <li><a href="#">👥 Customers</a></li>
          <li><a href="#">⚙️ Settings</a></li>
        </ul>
      </nav>

      <div style="margin-top:auto;font-size:13px;">
        <div class="small muted">Logged in as</div>
        <div style="font-weight:700">akira</div>
        <button class="btn secondary" id="logoutBtn" style="margin-top:10px;width:100%">Sign out</button>
      </div>
    </aside>

    <main class="main">
      <header>
        <div class="flex center gap-8">
          <button class="btn" id="menuToggle">☰</button>
          <div class="brand" style="color:#111827">Admin Dashboard</div>
        </div>

        <div class="search">
          <input placeholder="Search orders, products, customers..." />
        </div>

        <div class="actions">
          <button class="btn secondary">New</button>
          <button class="btn">Create</button>
        </div>
      </header>

      <section class="content">
        <div class="stats">
          <div class="card">
            <h3>Total Revenue</h3>
            <p>$12,489</p>
            <div class="small muted">+8% since last week</div>
          </div>

          <div class="card">
            <h3>Orders</h3>
            <p>1,204</p>
            <div class="small muted">34 open orders</div>
          </div>

          <div class="card">
            <h3>Customers</h3>
            <p>3,421</p>
            <div class="small muted">120 new</div>
          </div>

          <div class="card">
            <h3>Products</h3>
            <p>284</p>
            <div class="small muted">5 low stock</div>
          </div>
        </div>

        <div class="panel">
          <div class="table-wrap">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
              <h3 style="font-size:16px">Recent Orders</h3>
              <div class="small muted">Showing 10</div>
            </div>

            <table>
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Customer</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#1024</td>
                  <td>Somchai</td>
                  <td><span class="badge success">Completed</span></td>
                  <td>$89.00</td>
                  <td class="small muted">Oct 25, 2025</td>
                </tr>
                <tr>
                  <td>#1023</td>
                  <td>Rina</td>
                  <td><span class="badge warn">Pending</span></td>
                  <td>$45.50</td>
                  <td class="small muted">Oct 25, 2025</td>
                </tr>
                <tr>
                  <td>#1022</td>
                  <td>Chan</td>
                  <td><span class="badge success">Completed</span></td>
                  <td>$120.00</td>
                  <td class="small muted">Oct 24, 2025</td>
                </tr>
                <tr>
                  <td>#1019</td>
                  <td>Sophea</td>
                  <td><span class="badge">Refunded</span></td>
                  <td>$32.00</td>
                  <td class="small muted">Oct 23, 2025</td>
                </tr>
              </tbody>
            </table>
          </div>

          <aside class="right-panel">
            <h4 style="margin-bottom:10px">Quick Actions</h4>
            <div class="form-row">
              <label class="small muted">Create product</label>
              <input placeholder="Product name" />
            </div>
            <div class="form-row">
              <label class="small muted">Price</label>
              <input placeholder="$0.00" />
            </div>
            <div class="form-row">
              <label class="small muted">Category</label>
              <select>
                <option>Clothing</option>
                <option>Accessories</option>
                <option>Home</option>
              </select>
            </div>
            <button class="btn" style="width:100%">Add Product</button>

            <hr style="margin:14px 0;border:none;border-top:1px solid #eef2f7" />

            <h4 style="margin-bottom:10px">Activity</h4>
            <div class="small muted">2 new signups today</div>
            <div style="margin-top:8px">
              <div class="small">• Kaen registered</div>
              <div class="small">• New order #1025</div>
            </div>
          </aside>
        </div>

      </section>

      <footer style="padding:14px 24px;border-top:1px solid #eef2f7;background:#fff;display:flex;justify-content:space-between;align-items:center">
        <div class="small muted">© 2025 Zendo — Admin</div>
        <div class="small muted">Version 1.0</div>
      </footer>
    </main>
  </div>

  <script>
    // Sidebar toggle for small screens
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
    });

    // Simple logout demo
    document.getElementById('logoutBtn').addEventListener('click', () => {
      alert('Signing out... (demo)');
    });
  </script>
</body>
</html>
