// import { BrowserModule } from '@angular/platform-browser';
// import { NgModule } from '@angular/core';
// import { HttpClientModule } from '@angular/common/http';
// import { FormsModule } from '@angular/forms'; // For two-way data binding

// import { AppComponent } from './app.component';
// import { ItemComponent } from './item/item.component'; // Create this component

// @NgModule({
//   declarations: [
//     AppComponent,
//     ItemComponent
//   ],
//   imports: [
//     BrowserModule,
//     HttpClientModule,
//     FormsModule // Import FormsModule
//   ],
//   providers: [],
//   bootstrap: [AppComponent]
// })
// export class AppModule { }

import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { bootstrapApplication } from '@angular/platform-browser';
import { AppComponent } from './app.component'; // Adjust the path if necessary

bootstrapApplication(AppComponent);

// @NgModule({
//   imports: [
//     BrowserModule,
//     HttpClientModule,
//     FormsModule
//   ],
//   bootstrap: [AppComponent] // Keep this line to bootstrap the component
// })
// export class AppModule { }