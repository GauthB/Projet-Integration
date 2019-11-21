const {Builder, By, Key, until} = require('selenium-webdriver');

(async function example() {
  let driver = await new Builder().forBrowser('chrome').build();
  try {
    await driver.get('https://peopleflux.gauthierbohyn.com/pageContact.php');
    await driver.sleep(2000);
    await driver.findElement(By.id('email')).sendKeys('test@gmail.com', Key.TAB);
    await driver.sleep(2000);
    await driver.findElement(By.id('objet')).sendKeys('Ceci est un test pour l objet', Key.TAB);
    await driver.sleep(2000);
    await driver.findElement(By.id('message')).sendKeys('Ceci est un test comme message', Key.TAB);
    await driver.sleep(2000);
   // await driver.findElement(By.id('submitContact')).sendKeys(Key.ENTER);
   // await driver.sleep(2000);

  } finally {
    await driver.quit();
  }
})();
