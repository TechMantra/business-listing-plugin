import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('blp/business-details', {
    title: 'Business Details',
    icon: 'businessman',
    category: 'widgets',
    edit() {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                <p>Business Details Block</p>
            </div>
        );
    },
    save() {
        const blockProps = useBlockProps.save();
        return (
            <div {...blockProps}>
                <p>Business Details Block</p>
            </div>
        );
    }
});
