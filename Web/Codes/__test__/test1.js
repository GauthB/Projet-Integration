const {Builder, By, Key, until} = require('selenium-webdriver');

(async function example() {
  let driver = await new Builder().forBrowser('chrome').build();
  try {
    await driver.get('https://peopleflux.wecodx.com/contact.html');
    await driver.findElement(By.id('email')).sendKeys('test@gmail.com', Key.TAB);
    await driver.sleep(1500);
    await driver.findElement(By.id('objet')).sendKeys('Test Interface', Key.TAB);
    await driver.sleep(1500);
    await driver.findElement(By.id('message')).sendKeys('Ceci est un test d interface', Key.TAB);
    await driver.sleep(1500);
    await driver.findElement(By.id('submitContact')).sendKeys(Key.ENTER);
    await driver.sleep(500);

  } finally {
    await driver.quit();
  }
})();
