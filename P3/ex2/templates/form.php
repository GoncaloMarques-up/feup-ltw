<?php function outputLoginForm() { ?>
    <section id="login">
      <h1>Login</h1>
      <form>
        <label>
          Username <input type="text" name="username">
        </label>
        <label>
          Password <input type="password" name="password">
        </label>
        <input type="hidden" name="referer" value="<?=$_SERVER['HTTP_REFERER']?>">
        <button formaction="../actions/action_login.php" formmethod="post">Login</button>
      </form>
    </section>
<?php } ?>

<?php function outputRegisterForm() { ?>
    <section id="register">
      <h1>Register</h1>
      <form>
        <label>
          Username <input type="text" name="username">
        </label>
        <label>
          Real name <input type="text" name="real_name">
        </label>
        <label>
          E-mail <input type="email" name="email">
        </label>
        <label>
          Password <input type="password" name="password">
        </label>
        <input type="hidden" name="referer" value="<?=$_SERVER['HTTP_REFERER']?>">
        <button formaction="./actions/action_register.php" formmethod="post">Register</button>
      </form>
    </section>
<?php } ?>

<?php function printEditItemForm(array $article) { ?>
    <section id="edit">
      <h1>Edit article</h1>
      <form>
        <input type="hidden" name="id" value="<?=$article['id']?>">
        <label>
          Title <input type="text" name="title" value="<?=$article['title']?>">
        </label>
        <label>
          Introduction <textarea name="introduction"><?=$article['introduction']?></textarea>
        </label>
        <label>
          Text <textarea name="fulltext"><?=$article['fulltext']?></textarea>
        </label>
        <button formaction="../actions/action_edit_item.php" formmethod="post">Submit changes</button>
      </form>
    </section>
<?php } ?>

<?php function printCreateItemForm() { ?>
  <section id="create">
      <h1>Create Article</h1>
      <form>
        <label>
          Title <input type="text" name="title">
        </label>
        <label>
          Tags &#40;separated by comma&#41; <input type="text" name="tags">
        </label>
        <label>
          Introduction
          <textarea name="introduction"></textarea>
        </label>
        <label>
          Text
          <textarea name="fulltext"></textarea>
        </label>
        <button formaction="./actions/action_create_item.php" formmethod="post">Create</button>
      </form>
    </section>
<?php } ?>