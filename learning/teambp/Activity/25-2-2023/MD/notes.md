# CSS Variables

CSS variables are declared once at the beggining and used in various parts of the code. Makes the code easy to edit.

```css
:root {
  --default-box-sizing: border-box;
  --default-width: 100%;
  --default-padding-x: 1rem;
  --default-padding-y: 0rem;
  --default-margin-x: 0.5rem;
  --default-margin-y: 0rem;
  --default-font-size: 1rem;
  --default-card-background-color: ghostwhite;
}
```

```html
<section class="container-fluid">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h6>Hello World</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h6>Hello World</h6>
        </div>
      </div>
    </div>
  </div>
</section>
```

# Bootstrap

## Background colors

Varios colors represent various meanings i.e <br>
`red-danger` <br>
`orange-warning` <br>
`light-blue-info` <br>
`blue-emphasis` <br>
`black-information` <br>
`grey-secondary text`

```html
<section class="container-fluid">
  <div class="row">
    <div class="col-6">
      <div class="card bg-white mt-3">
        <div class="card-body">
          <h6>bg-white</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-light mt-3">
        <div class="card-body">
          <h6>bg-light</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-info mt-3">
        <div class="card-body">
          <h6>bg-info</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-primary mt-3">
        <div class="card-body">
          <h6>bg-primary</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-danger mt-3">
        <div class="card-body">
          <h6>bg-danger</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-warning mt-3">
        <div class="card-body">
          <h6>bg-warning</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-dark mt-3">
        <div class="card-body">
          <h6 class="text-bg-dark">bg-dark</h6>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card bg-secondary mt-3">
        <div class="card-body">
          <h6>bg-secondary</h6>
        </div>
      </div>
    </div>
  </div>
</section>
```
