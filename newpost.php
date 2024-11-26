<div class="new_post">
    <h2>New post</h2>
    <h3>Share something new</h3>
    <form name="new_post" method="POST" action="send_post.php" enctype="multipart/form-data" autocomplete="off">
        <label for="Topic">
            Topic:
        </label>
        <input type="text" id="topic" name="topic"
               placeholder="Enter topic" required>

        <label for="text">Text:</label><br>
        <textarea id="text" name="text" cols="80" placeholder="Enter some text" required></textarea>

        <br><label>
            Add some pictures:
        </label>
        <input type="file" id="picture" name="picture">

        <div class="wrap">
            <button type="submit">
                Submit
            </button>
        </div>
    </form>
</div>