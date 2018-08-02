<!-- All variables are tagged with {{ }} just to specifify in the templates where they should be plugged in. I've commented out lines that have variables in the code and duplicated them with the variable values plugged in just so they can display on this mockup.

Here are the default values for this page:
{{ CompanyName }} - White Castle Roofing
{{ CompanyLogo }} - https://companycam.imgix.net/icons-logos/customer-logos/white-castle-roofing-logo.png
{{ CompanyWebsite }} - https://whitecastleroofing.com
{{ PageUrl }} - https://whitecastleroofing.com/our-projects
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Meta  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title>{{ CompanyName }} Projects</title> -->
    <title>White Castle Roofing Projects</title>
    <meta name="description" content="{{ Description }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css" rel="stylesheet" />
    <link href="styles/styles.processed.css" rel="stylesheet">
    <meta property="og:url" content="{{ PageUrl }}">
    <meta property="og:title" content="{{ CompanyName }} Projects">
    <meta property="og:description" content="Check out some completed projects from {{ CompanyName }}.">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="{{ PageUrl }}">
    <meta name="twitter:title" content="{{ CompanyName }} Projects">
    <meta name="twitter:description" content="Check out some completed projects from {{ CompanyName }}.">
  </head>
  <body class="project-index">
    <header class="project-index__header container">
      <a href="https://whitecastleroofing.com"><img src="https://companycam.imgix.net/icons-logos/customer-logos/white-castle-roofing-logo.png" class="company-logo" alt="White Castle Roofing Logo"></a>
      <div class="project-index__title">
        <h1>Our Work</h1>
        <img src="powered-by-image.svg" width="150" alt="Powered By CompanyCam graphic">
      </div>
      <div class="project-index__filter">
        <div class="filter__list">
          <div class="filter">
            <label for="type" class="filter__label">Type</label>
            <select class="filter__dropdown select-type" name="type" id="type" multiple>
              <option class="search-label" value="" disabled>Type to search...</option>
              <option value="roofs">Residential Roofing</option>
              <option value="siding">Commercial Roofing</option>
              <option value="gutters">Concrete Foundation</option>
              <option value="fascia">Home Remodeling</option>
              <option value="roofs2">Residential and Construction Roofing</option>
              <option value="siding2">Siding</option>
              <option value="gutters2">Gutters</option>
              <option value="fascia2">Fascia</option>
            </select>
          </div>
          <div class="filter">
            <label for="materials" class="filter__label">Materials Used</label>
            <select class="filter__dropdown select-materials" name="materials" id="materials" multiple>
              <option class="search-label" value="" disabled>Type to search...</option>
              <option value="roofs">Roofs</option>
              <option value="siding">Siding</option>
              <option value="gutters">Gutters</option>
              <option value="fascia">Fascia</option>
              <option value="roofs2">Roofs</option>
              <option value="siding2">Siding</option>
              <option value="gutters2">Gutters</option>
              <option value="fascia2">Fascia</option>
            </select>
          </div>
          <div class="filter">
            <label for="zip" class="filter__label">Zip Code</label>
            <select class="filter__dropdown select-zip" name="zip" id="zip" multiple>
              <option class="search-label" value="" disabled>Type to search...</option>
              <option value="68516">68516</option>
              <option value="68502">68502</option>
              <option value="68508">90210</option>
              <option value="68512">60652</option>
            </select>
          </div>
          <div class="filter filter--search">
            <label>
              <input type="submit">
              <img src="https://companycam.imgix.net/icons-logos/icons/search.svg">
            </label>
            <input type="text" placeholder="Search for a project">
          </div>
        </div>
      </div>
    </header>
    <main class="project-index__main">
      <div class="container">
        <div class="project-list">
          <a href="/project.html" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">20th St. and Harrison Ave</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">Yankee Hill Rd. and Shady Hollow St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <div class="project project--estimate-form">
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
          </div>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
          <a href="#" class="project">
            <div class="project__cover" style="background-image: url('https://static.companycam.com/Zz35phgX1515019274.jpg')">
              <div class="project__address">
                <span>Near</span>
                <h3 class="project__street">27th St.</h3>
                <h4 class="project__city">Lincoln, NE &nbsp;|&nbsp; 68502</h4>
              </div>
            </div>
            <div class="project__info">
              <h2 class="project__title">Samson Project</h2>
              <div class="project__meta-data">
                <p><strong>Type:</strong> Composite</p>
                <p><strong>Materials:</strong> GAF Weather Wood, Dynaflex, Roofing Caulk, GAF Roofing Felt, Tamko Nails</p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="companycam-branding-footer">
        <a href="https://companycam.com?utm_source=p2w&utm_medium=web" target="_blank">
          <img width="200" src="https://companycam.imgix.net/icons-logos/logos/Black-Logo-Horizontal.png" alt="CompanyCam Logo">
          <h6>Smart Photos powered by CompanyCam.</h6>
          <p>The photo app every contractor needs.</p>
        </a>
      </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script src="scripts/index.js"></script>
  </body>
</html>