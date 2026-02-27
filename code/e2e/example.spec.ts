import { test, expect } from "@playwright/test";

// test('has title', async ({ page }) => {
//   await page.goto('https://playwright.dev/');

//   // Expect a title "to contain" a substring.
//   await expect(page).toHaveTitle(/Playwright/);
// });

// test('get started link', async ({ page }) => {
//   await page.goto('https://playwright.dev/');

//   // Click the get started link.
//   await page.getByRole('link', { name: 'Get started' }).click();

//   // Expects page to have a heading with the name of Installation.
//   await expect(page.getByRole('heading', { name: 'Installation' })).toBeVisible();
// });

test("test", async ({ page }) => {
  await page.goto("http://localhost:8000/");
  await page.getByRole("link", { name: "Crée un Livre" }).click();
  await page.getByRole("textbox", { name: "Votre titre" }).click();
  await page.getByRole("textbox", { name: "Votre titre" }).fill("ok");
  await page.getByRole("textbox", { name: "Votre auteur" }).click();
  await page.getByRole("textbox", { name: "Votre auteur" }).fill("google");
  await page.getByRole("textbox", { name: "Votre description" }).click();
  await page.getByRole("textbox", { name: "Votre description" }).fill("ok");
  await page.getByRole("textbox", { name: "Votre URL" }).click();
  await page.getByRole("textbox", { name: "Votre URL" }).fill("url");
  await page.locator('input[name="date"]').fill("2026-01-17");
  await page.getByRole("listbox").selectOption("1");
  await page.getByRole("listbox").selectOption(["1", "2"]);
  await page.getByRole("listbox").selectOption(["1", "2", "3"]);
  await page.getByRole("listbox").selectOption(["1", "2", "3", "4"]);
  await page.getByRole("button", { name: "Send" }).click();
});

test("test2", async ({ page }) => {
  await page.goto("http://localhost:8000/");
  await page.getByRole("link", { name: "Voir Livre" }).click();
  await page.getByRole("link", { name: "Voir le livre" }).nth(3).click();
  await page.getByRole("link", { name: "Suprimer" }).click();
});
