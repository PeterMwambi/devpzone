## Bootstrap and CSS

### Container

Containers make use of the `min-width` media query with `max-width` value specified
for each breakpoint

```css
@media (min-width: 1400px) {
  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    max-width: 1320px;
  }
}

@media (min-width: 1200px) {
  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    max-width: 1140px;
  }
}

@media (min-width: 992px) {
  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    max-width: 960px;
  }
}

@media (min-width: 768px) {
  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    max-width: 720px;
  }
}

@media (min-width: 576px) {
  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    max-width: 540px;
  }
}
```

Containers have their width set to 100%, `width: 100% `, `padding` set to 12 px for both left and right `padding-left:12px` `padding-right:12px` . `margin` is set to `0 auto`
i.e `margin-top:0` and `margin-bottom: 0` , `margin-left: auto` and `margin-right: auto`.

```css
.container,
.container-lg,
.container-md,
.container-sm,
.container-xl,
.container-xxl {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0rem;
  width: 100%;
  padding-right: calc(var(--bs-gutter-x) * 0.5);
  padding-left: calc(var(--bs-gutter-y) * 0.5);
  margin-left: auto;
  margin-right: auto;
}
```

### Rows

##### Basic row properties

Rows have a `display: flex`. `flex-wrap` behavior is set to `wrap` (Elements are pushed to the next line whenever there is an overflow) `margin-left` and
`margin-right` is set to 12px.

Row elements inherit a `box-sizing` property of `border-box` that is triggered `::before` , `::after` and `*` of each element.

```css
.row {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0rem;
  display: flex;
  flex-wrap: wrap;
  margin-right: calc(-0.5 * var(--bs-gutter-x));
  margin-left: calc(-0.5 * var(--bs-gutter-x));
}
```

##### Row element properties

Row elements have a `flex-shrink` value of 0, a `width` and `max-width` of 100%. `padding-left` and `padding-right` properties are set to 12px. `margin-top` is

### Columns
