//
//  DetailViewController.h
//  Time tracker
//
//  Created by Theres on 16.10.13.
//  Copyright (c) 2013 bakerstreet corp. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface DetailViewController : UIViewController

@property (strong, nonatomic) id detailItem;

@property (weak, nonatomic) IBOutlet UILabel *detailDescriptionLabel;
@end
