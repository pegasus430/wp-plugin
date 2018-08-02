<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

          <h3>Get an estimate</h3>
          <form class="estimate-form__form" action="">
            <div class="estimate-form__field">
              <label for="estimate-form-name">Name</label>
              <input type="text" name="estimate-form-name" id="estimate-form-name" required>
            </div>
            <div class="estimate-form__field">
              <label for="estimate-form-email">Email</label>
              <input type="text" name="estimate-form-email" id="estimate-form-email" required>
            </div>
            <div class="estimate-form__field">
              <label for="estimate-form-address">Address</label>
              <input type="text" name="estimate-form-address" id="estimate-form-address" required>
            </div>
            <div class="estimate-form__field">
              <label for="estimate-form-phone">Phone</label>
              <input type="text" name="estimate-form-phone" id="estimate-form-phone" required>
            </div>
            <div class="estimate-form__field">
              <label for="estimate-form-comments">Comments</label>
              <textarea name="estimate-form-comments" id="estimate-form-comments" required rows="2"></textarea>
            </div>
            <input class="form-btn" type="submit" value="Submit">
          </form>

