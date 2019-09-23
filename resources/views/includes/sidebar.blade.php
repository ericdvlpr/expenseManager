  <nav class="navbar bg-light">
      <ul class="navbar-nav">
      <li class="nav-item">
          Expense Management
          <ul>
              <li><a href={{route('expense_category.index')}}>Expenses Category</a></li>
              <li><a href={{route('expense.index')}}>Expenses</a></li>
          </ul>
      </li>
      <li class="nav-item">
          User Management
          <ul>
              <li><a href={{route('role.index')}}>Roles</a></li>
              <li><a href={{route('user.index')}}>User</a></li>
          </ul>
      </li>
      </ul>
  </nav>
